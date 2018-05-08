<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelMaster extends Model
{
    
    static function getDatarute(){
    	$query = DB::table('rute')
    			 ->selectRaw('rute.*,transportation.id as `trasport_id`,transportation_type.id as `type_id`, transportation_type.description as `name_type`')
    			 ->join('transportation','rute.transportationid','=','transportation.id')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getStation(){
        $query = DB::table('stasiun')
                 ->select('*')
                 ->orderBy('id','DESC')
                 ->get();
        return $query->toArray();
    }

    static function getDataTransport(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.description as `nameType`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function checkRuteTransport($id){
    	$query = DB::table('rute')
    			 ->select('*')
    			 ->whereRaw('transportationid = "'.$id.'"')
    			 ->get();
    	return $query->toArray();
    }

    static function saveStation($input){
        try {
            $abbr = strtoupper($input['abbr']);
            $auto = \App\ModelMaster::getAutoNumberStation($abbr);
            $query = DB::table('stasiun')
                     ->insert([
                        'id' => $auto,
                        'name' => $input['description'],
                        'city' => $input['city'],
                        'abbr' => strtoupper($input['abbr'])
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function updateStation($input){
        try {
            $prim = strtoupper($input['abbr_edit']);
            $deleteFirst = DB::table('stasiun')->where('id',$input['id_edit'])->delete();
             $auto = \App\ModelMaster::getAutoNumberStation($prim);
            $query = DB::table('stasiun')       
                     ->insert([
                        'id' => $auto,
                        'name' => $input['description_edit'],
                        'city' => $input['city_edit'],
                        'abbr' => strtoupper($input['abbr_edit'])
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function DeleteStat($id){
        try {

            $query = DB::table('stasiun')
                     ->where('id',$id)
                     ->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function getAutoNumberStation($input){
        $initial = 'ST';
        $abbr = $input;
        $end = '';
        $data = DB::table('stasiun')->orderBy('id','DESC')->get();
        foreach ($data->toArray() as $key => $value) {
            $end = $value->id;
        }
        $trim = substr($end,5,8);
        $equal = $trim+1;
        $returning = $initial.$abbr.sprintf('%03d',$equal);
        return $returning;
    }

    static function getAutoNumberRUTE(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'RUTE';
    	$year = date('Y');
    	$end = '';
    	$data = DB::table('rute')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}

    	$trim = substr($end,8,12);
    	$equal = $trim+1;
    	$returning = $initial.$year.sprintf('%04d',$equal);
    	return $returning;
    }

    static function saveRUTE($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberRUTE();
    		$query = DB::table('rute')
    				 ->insert([
    				 	'id' => $auto,
    				 	'rute_from' => $input['rute_from'],
    				 	'rute_to' => $input['rute_to'],
    				 	'depart' => $input['depart'],
    				 	'arrive' => $input['Arrive'],
    				 	'price' => $input['price'],
    				 	'transportationid' => $input['transport_id']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getAutoNumberTTYPE(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'TTP';
    	$end = '';
    	$data = DB::table('transportation_type')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	$trim = substr($end,3,7);
    	$equal = $trim+1;
    	$returning = $initial.sprintf('%04d',$equal);
    	return $returning;
    }

    static function updateRUTE($input){
    	try {
    		$query = DB::table('rute')
 					 ->where('id',$input['id_edit'])   		
    				 ->update([
    				 	'rute_from' => $input['rute_from_edit'],
    				 	'rute_to' => $input['rute_to_edit'],
    				 	'depart' => $input['depart_edit'],
    				 	'arrive' => $input['Arrive_edit'],
    				 	'price' => $input['price_edit'],
    				 	'transportationid' => $input['transport_id_edit']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteRUTE($id){
    	try {

    		$query = DB::table('rute')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getTransportType(){
    	$query = DB::table('transportation_type')
    			 ->get();
    	return $query->toArray();
    }

    static function saveTransportType($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberTTYPE();
    		$query = DB::table('transportation_type')
    				 ->insert([
    				 	'id' => $auto,
    				 	'description' => $input['description']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function updateTransportType($input){
    	try {
    		$query = DB::table('transportation_type')
 					 ->where('id',$input['id_edit'])   		
    				 ->update([
    				 	'description' => $input['description_edit']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteTransportType($id){
    	try {

    		$query = DB::table('transportation_type')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function getListTransportation(){
    	$query = DB::table('transportation')
    			 ->selectRaw('transportation.*,transportation_type.id as `transportType_id`,transportation_type.description as `transportType_desc`')
    			 ->join('transportation_type','transportation.transportation_typeid','=','transportation_type.id')
    			 ->get();
    	return $query->toArray();
    }

    static function getAutoNumberTRANSPORT(){
    	date_default_timezone_set('Asia/Jakarta');
    	$initial = 'TR';
    	$year = date('Y');
    	$end = '';
    	$data = DB::table('transportation')->get();
    	foreach ($data->toArray() as $key => $value) {
    		$end = $value->id;
    	}
    	$trim = substr($end,6,11);
    	$equal = $trim+1;
    	$returning = $initial.$year.sprintf('%04d',$equal);
    	return $returning;
    }

    static function saveTransportation($input){
    	try {
    		$auto = \App\ModelMaster::getAutoNumberTRANSPORT();
    		$query = DB::table('transportation')
    				 ->insert([
    				 	'id' => $auto,
    				 	'code' => $input['code'],
    				 	'description' => $input['description'],
    				 	'seat_qty' => $input['seat_qty'],
    				 	'transportation_typeid' => $input['transport_type_id'],
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function updateTransportation($input){
    	try {
    		$query = DB::table('transportation')
    				 ->where('id',$input['id_edit'])
    				 ->update([
    				 	'code' => $input['code_edit'],
    				 	'description' => $input['description_edit'],
    				 	'seat_qty' => $input['seat_qty_edit'],
    				 	'transportation_typeid' => $input['transport_type_id_edit'],
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function deleteTransportation($id){
    	try {

    		$query = DB::table('transportation')
    				 ->where('id',$id)
    				 ->delete();

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function takeID($id){
        $query = DB::table('user')
                 ->where('id',$id)
                 ->get();
                 $ret = '';
        foreach ($query->toArray() as $key => $value) {
            $ret = $value->id;
        }
        return $ret;
    }

    static function getAllUser($level){

        if($level == 'Operator'){
            $query = DB::table('user')
                 ->whereRaw('level != "SUPER ADMIN" AND id = "'.AUTH::id().'"')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }else if($level == 'SUPER ADMIN'){
            $query = DB::table('user')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }else if($level == 'Admin'){
            $query = DB::table('user')
                 ->whereRaw('level != "SUPER ADMIN"')
                 ->select('*')
                 ->get();
            return $query->toArray();
        }
    }

    static function getAutoNumberUSER(){
        date_default_timezone_set('Asia/Jakarta');
        $initial = 'US';
        $end = '';
        $data = DB::table('user')->select('id_user')->get();
        foreach ($data->toArray() as $key => $value) {
            $end = $value->id_user;
        }
        $trim = substr($end,2,6);
        $equal = $trim+1;
        $returning = $initial.sprintf('%04d',$equal);
        return $returning;
    }

    static function saveUSER($input){
        try {
            date_default_timezone_set('Asia/Jakarta');
            $auto = \App\ModelMaster::getAutoNumberUSER();
            $query = DB::table('user')
                     ->insert([
                        'id' => '',
                        'id_user' => $auto,
                        'username' => $input['username'],
                        'password' => bcrypt($input['password']),
                        'fullname' => $input['fullname'],
                        'level' => $input['level'],
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function updateUSER($input){
        try {
            date_default_timezone_set('Asia/Jakarta');
            $query = DB::table('user')
                     ->where('id_user',$input['id_edit'])
                     ->update([
                        'username' => $input['username_edit'],
                        'password' => bcrypt($input['password_edit']),
                        'fullname' => $input['fullname_edit'],
                        'level' => $input['level_edit'],
                        'updated_at' => date('Y-m-d')
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function deleteUSER($id){
        try {

            $query = DB::table('user')
                     ->where('id_user',$id)
                     ->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function checkStationExisting($id){
        $query = DB::table('stasiun')
                 ->where('id',$id)
                 ->get();
        $data = $query->toArray();

        $row = count($data);

        if($row > 0){
            return "Exist";
        }else{
            return "Nay";
        }
    }

    static function saveImportStation($input){
        try {

            foreach ($input['id'] as $key => $value) {
                
                $checkData = \App\ModelMaster::checkStationExisting($value);

                if($checkData == 'Exist'){

                    $queryUPD = DB::table('stasiun')
                                ->where('id',$value)
                                ->update([
                                    'name' => $input['name'][$key],
                                    'city' => $input['city'][$key],
                                    'abbr' => $input['abbr'][$key],
                                ]);

                }else{

                    $queryUPD = DB::table('stasiun')
                                ->insert([
                                    'id' => $value,
                                    'name' => $input['name'][$key],
                                    'city' => $input['city'][$key],
                                    'abbr' => $input['abbr'][$key],
                                ]);

                }

            }


            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function getDataAirport(){
        $query = DB::table('airport')
                 ->get();
        return $query->toArray();
    }

    static function saveAirport($input){
        try {
            $abbr = strtoupper($input['abbr']);
            $auto = \App\ModelMaster::getAutoNumberPort($abbr);
            $query = DB::table('airport')
                     ->insert([
                        'id' => $auto,
                        'name' => $input['description'],
                        'city' => $input['city'],
                        'abbr' => strtoupper($input['abbr'])
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function updateAirport($input){
        try {
            $prim = strtoupper($input['abbr_edit']);
            $deleteFirst = DB::table('airport')->where('id',$input['id_edit'])->delete();
             $auto = \App\ModelMaster::getAutoNumberPort($prim);
            $query = DB::table('airport')       
                     ->insert([
                        'id' => $auto,
                        'name' => $input['description_edit'],
                        'city' => $input['city_edit'],
                        'abbr' => strtoupper($input['abbr_edit'])
                     ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function DeleteAirport($id){
        try {

            $query = DB::table('airport')
                     ->where('id',$id)
                     ->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static function getAutoNumberPort($input){
        $initial = 'BU';
        $abbr = $input;
        $end = '';
        $data = DB::table('airport')->orderBy('id','DESC')->get();
        foreach ($data->toArray() as $key => $value) {
            $end = $value->id;
        }
        $trim = substr($end,5,8);
        $equal = $trim+1;
        $returning = $initial.$abbr.sprintf('%03d',$equal);
        return $returning;
    }

}
