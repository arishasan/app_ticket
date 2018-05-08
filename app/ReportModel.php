<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    
    static function getCust(){
    	$query = DB::table('customer')
    			 ->get();
    	return $query->toArray();
    }

    static function getTransportation(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.description as `transportation_type_name`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getRute(){
    	$query = DB::table('rute')
    			 ->get();
    	return $query->toArray();
    }

    static function getReservation(){
    	$query = DB::table('reservation')
    			 ->get();
    	return $query->toArray();
    }

    static function getReservationByDate($d1,$d2){
        $query = DB::table('reservation')
                 ->select('*')
                 ->whereRaw('SUBSTR(reservation_date,1,10) BETWEEN "'.$d1.'" AND "'.$d2.'" ')
                 ->get();
        return $query->toArray();
    }

    static function getDataReportDeppTrain(){
        $query = DB::table('rute')
                 ->selectRaw('rute.rute_from,transportation.description,rute.rute_to,rute.depart,rute.arrive,rute.price,transportation.seat_qty,transportation.id as `transid`,rute.id as `ruteid`')
                 ->join('transportation','rute.transportationid','=','transportation.id')
                 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
                 ->whereRaw('transportation_type.description LIKE "train"')
                 ->get();
        return $query->toArray();
    }

    static function getDataReportDeppPlane(){
        $query = DB::table('rute')
                 ->selectRaw('rute.rute_from,transportation.description,rute.rute_to,rute.depart,rute.arrive,rute.price,transportation.seat_qty,transportation.id as `transid`,rute.id as `ruteid`')
                 ->join('transportation','rute.transportationid','=','transportation.id')
                 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
                 ->whereRaw('transportation_type.description LIKE "airplane"')
                 ->get();
        return $query->toArray();
    }

    static function getRuteFromAliases($id,$tit){
        $retu = '';
        $retus = '';
        if($tit == 'airplane'){
            $query = DB::table('airport')
                 ->where('id',$id)->get();

            foreach ($query->toArray() as $key => $value) {
                $retus = $value->name.' '.'('.$value->abbr.')'.' '.$value->city;
            }

            $retu = $retus;

        }else{

            $query = DB::table('stasiun')
                 ->where('id',$id)->get();

            foreach ($query->toArray() as $key => $value) {
                $retus = $value->name.' '.'('.$value->abbr.')'.' '.$value->city;
            }

            $retu = $retus;
        }

        return $retu;

    }

    static function getEarning($tit){

    	if($tit == 'station'){

	        $query = DB::table('reservation')
	                 ->selectRaw('SUBSTR(reservation.reservation_date,1,10) as `Date`,stasiun.name as `stat_name`, sum(reservation.price) as `earn`')
	                 ->join('rute','reservation.ruteid','=','rute.id')
	                 ->join('stasiun','rute.rute_from','=','stasiun.id')
	                 ->groupby('Date')
	                 ->groupby('stat_name')
	                 ->get();
	        return $query->toArray();

	    }else{

	    	$query = DB::table('reservation')
	                 ->selectRaw('SUBSTR(reservation.reservation_date,1,10) as `Date`,airport.name as `stat_name`, sum(reservation.price) as `earn`')
	                 ->join('rute','reservation.ruteid','=','rute.id')
	                 ->join('airport','rute.rute_from','=','airport.id')
	                 ->groupby('Date')
	                 ->groupby('stat_name')
	                 ->get();
	        return $query->toArray();

	    }

    }

    static function getEarningBbyDate($d1,$d2,$ev3){

    	if($ev3 == 'station'){

	        $query = DB::table('reservation')
	                 ->selectRaw('SUBSTR(reservation.reservation_date,1,10) as `Date`,stasiun.name as `stat_name`, sum(reservation.price) as `earn`')
	                 ->join('rute','reservation.ruteid','=','rute.id')
	                 ->join('stasiun','rute.rute_from','=','stasiun.id')
	                 ->whereRaw('SUBSTR(reservation_date,1,10) BETWEEN "'.$d1.'" AND "'.$d2.'" ')
	                 ->groupby('Date')
	                 ->groupby('stat_name')
	                 ->get();
	                 
	        return $query->toArray();

    	}else{

    		$query = DB::table('reservation')
	                 ->selectRaw('SUBSTR(reservation.reservation_date,1,10) as `Date`,airport.name as `stat_name`, sum(reservation.price) as `earn`')
	                 ->join('rute','reservation.ruteid','=','rute.id')
	                 ->join('airport','rute.rute_from','=','airport.id')
	                 ->whereRaw('SUBSTR(reservation_date,1,10) BETWEEN "'.$d1.'" AND "'.$d2.'" ')
	                 ->groupby('Date')
	                 ->groupby('stat_name')
	                 ->get();
	                 
	        return $query->toArray();

    	}

    }

    static function getReservedSeat($id){
        date_default_timezone_set('Asia/Jakarta');
        $query = DB::table("reservation")
                 ->select('reservation.*')
                 ->join('rute','reservation.ruteid','=','rute.id')
                 ->whereRaw('reservation.ruteid = "'.$id.'" AND reservation.depart_date >= "'.date('Y-m-d').'"')
                 ->get();
        $data = $query->toArray();

        if(count($data) == 0){
            return 0;
        }else{
            return count($data);
        }

    }

    static function getDataTransactionPeriode(){
        $query = DB::table('reservation')
                 ->selectRaw('substr(reservation_date,1,7) as `periode`, count(id) as `counted_reservation`,sum(price) as `earning`')
                 ->groupby('periode')
                 ->get();
        return $query->toArray();
    }

    static function getDataTransactionPeriodeFiltered($v1,$v2){
        
            $query = DB::table('reservation')
                 ->selectRaw('substr(reservation_date,1,7) as `periode`, count(id) as `counted_reservation`,sum(price) as `earning`')
                 ->whereRaw('substr(reservation_date,1,4) = "'.$v1.'" AND substr(reservation_date,6,2) = "'.$v2.'"')
                 ->groupby('periode')
                 ->get();
            return $query->toArray();

    }


}
