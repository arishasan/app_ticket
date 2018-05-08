<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    
    static function getCountUser(){
    	$query = DB::table('user')
    			 ->get();
    	return count($query->toArray());
    }

    static function getReserve(){
    	$query = DB::table('reservation')
    			 ->get();
    	return count($query->toArray());
    }

    static function getTransportation(){
    	$query = DB::table('transportation')
    			 ->get();
    	return count($query->toArray());
    }

    static function getCustomerCount(){
    	$query = DB::table('customer')
    			 ->get();
    	return count($query->toArray());
    }

    static function getEarning(){
    	$query = DB::table('reservation')
    			 ->selectRaw('SUBSTR(reservation_date,1,10) as `payment_date`,SUM(price) as `payment`')
    			 ->groupBy('payment_date')
    			 ->get();
    	return $query->toArray();
    }

    static function getMale(){
        $query = DB::table('customer')
                 ->selectRaw('count(customer.id) as `countMale`,substr(reservation.reservation_date,1,10) as `date`')
                 ->join('reservation','reservation.customerid','=','customer.id')
                 ->groupBy('date')
                 ->where('gender','Male')
                 ->get();
        return $query->toArray();
    }

    static function getFemale(){
        $query = DB::table('customer')
                 ->selectRaw('count(customer.id) as `countFem`,substr(reservation.reservation_date,1,10) as `date`')
                 ->join('reservation','reservation.customerid','=','customer.id')
                 ->groupBy('date')
                 ->where('gender','Female')
                 ->get();
        return $query->toArray();
    }

    static function getDate(){
        $query = DB::table('reservation')
                 ->selectRaw('substr(reservation.reservation_date,1,10) as `date`')
                 ->groupBy('date')
                 ->get();
        return $query->toArray();
    }

    static function getDateTransportCount(){
    	$query = DB::table('reservation')
    			 ->selectRaw('IFNULL(substr(reservation.reservation_date,6,2),0) as `date`, IFNULL(count(reservation.id),0) as `counted`')
    			 ->join('rute','reservation.ruteid','=','rute.id')
    			 ->join('transportation','rute.transportationid','=','transportation.id')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->groupBy('date')
    			 ->get();

    	return $query->toArray();
    }

    static function getDateTransportTrainCount(){
    	$query = DB::table('reservation')
    			 ->selectRaw('IFNULL(substr(reservation.reservation_date,6,2),0) as `date`, IFNULL(count(reservation.id),0) as `counted`')
    			 ->join('rute','reservation.ruteid','=','rute.id')
    			 ->join('transportation','rute.transportationid','=','transportation.id')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->whereRaw('transportation_type.description LIKE "%train%"')
    			 ->groupBy('date')
    			 ->get();

    	return $query->toArray();
    }

    static function getDateTransportairplaneCount(){
    	$query = DB::table('reservation')
    			 ->selectRaw('IFNULL(substr(reservation.reservation_date,6,2),0) as `date`, IFNULL(count(reservation.id),0) as `counted`')
    			 ->join('rute','reservation.ruteid','=','rute.id')
    			 ->join('transportation','rute.transportationid','=','transportation.id')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->whereRaw('transportation_type.description LIKE "%airplane%"')
    			 ->groupBy('date')
    			 ->get();

    	return $query->toArray();
    }

}
