<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{

    public function user_save(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveUSER($input);

        if($execute){
            echo "Success Inserting New User";
        }else{
            echo "Failed Inserting New User";
        }

    }

    public function user_update(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateUSER($input);

        if($execute){
            echo "Success Saving User";
        }else{
            echo "Failed Saving User";
        }

    }

    public function user_delete($id){
        $execute = \App\ModelMaster::deleteUSER($id);

        if($execute){
            echo "Success Deleting User";
        }else{
            echo "Failed Deleting User";
        }
    }



    public function rute(){
        $data['dataAirport'] = \App\ModelMaster::getDataAirport();
        $data['dataStation'] = \App\ModelMaster::getStation();
    	$data['dataTransport'] = \App\ModelMaster::getDataTransport();
    	$data['datarute'] = \App\ModelMaster::getDatarute();
    	return view('master/rute')->with($data);
    }

    public function save_the_rute(Request $request){
    	$input = $request->all();

    	$execute = \App\ModelMaster::saveRUTE($input);

    	if($execute){
    		echo "Success Saving The Rute";
    	}else{
    		echo "Failed Saving The Rute";
    	}

    }

    public function save_the_station(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveStation($input);

        if($execute){
            echo "Success Saving The Station";
        }else{
            echo "Failed Saving The Station";
        }

    }

    public function update_station(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateStation($input);

        if($execute){
            echo "Success Updating The Station";
        }else{
            echo "Failed Updating The Station";
        }
        

    }

    public function delete_the_station($id){
        $execute = \App\ModelMaster::DeleteStat($id);

        if($execute){
            echo "Success Deleting The Station";
        }else{
            echo "Failed Deleting The Station";
        }
    }


    public function stasiun(){
        $data['datastat'] = \App\ModelMaster::getStation();
        return view('master/stasiun')->with($data);
    }

    public function update_the_rute(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateRUTE($input);

        if($execute){
            echo "Success Updating The Rute";
        }else{
            echo "Failed Updating The Rute";
        }

    }

    public function delete_the_rute($id){
        $execute = \App\ModelMaster::deleteRUTE($id);

        if($execute){
            echo "Success Deleting The Rute";
        }else{
            echo "Failed Deleting The Rute";
        }
    }

    public function transport_type(){
        $data['listDataTType'] = \App\ModelMaster::getTransportType();
        return view('master/transport_type')->with($data);
    }

    public function save_the_transport_type(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveTransportType($input);

        if($execute){
            echo "Success Saving The Transport Type";
        }else{
            echo "Failed Saving The Transport Type";
        }

    }

    public function update_the_transport_type(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateTransportType($input);

        if($execute){
            echo "Success Updating The Transport Type";
        }else{
            echo "Failed Updating The Transport Type";
        }

    }

    public function delete_the_transport_type($id){
        $execute = \App\ModelMaster::deleteTransportType($id);

        if($execute){
            echo "Success Deleting The Transport Type";
        }else{
            echo "Failed Deleting The Transport Type";
        }
    }

    public function transportation(){
        $data['listTransportationType'] = \App\ModelMaster::getTransportType();
        $data['listTransportation'] = \App\ModelMaster::getListTransportation();
        return view('master/transportation')->with($data);
    }

    public function generateRandomCode($length = 8) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }

    public function save_the_transportation(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveTransportation($input);

        if($execute){
            echo "Success Inserting The Transportation";
        }else{
            echo "Failed Inserting The Transportation";
        }

    }

    public function update_the_transportation(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateTransportation($input);

        if($execute){
            echo "Success Saving The Transportation";
        }else{
            echo "Failed Saving The Transportation";
        }

    }

    public function delete_the_transportation($id){
        $execute = \App\ModelMaster::deleteTransportation($id);

        if($execute){
            echo "Success Deleting The Transportation";
        }else{
            echo "Failed Deleting The Transportation";
        }
    }

    public function template_station(){
       return response()->download(public_path('download/template_station.xlsx'));
    }

    public function save_import_station_up(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveImportStation($input);

        if($execute){
            echo "Success Importing The Station";
        }else{
            echo "Failed Importing The Station";
        }
    }

    public function uploadStat(Request $request){
        
        try {
            
            $input = $request->all();

            $exten = $input['import']->extension();
            // echo $exten;
            if($exten == 'xlsx' OR $exten == 'xls'){
                
                $destinationPath = 'uploads';
                $fileName = $input['import']->getClientOriginalName();
                $input['import']->move($destinationPath,$fileName);
                
                Excel::load(public_path () . '/uploads/'.$fileName, function($reader){

                    ?>
                    <form action="<?php echo url('save_import_station') ?>" method="POST" class="form-imported">
                    <h4>PREVIEW BEFORE IMPORT</h4>
                    <hr>
                    <?php echo csrf_field() ?>
                    <table class="table table-striped" style="color:black;">
                        <thead>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Abbr</th>
                        </thead>
                        <tbody>
                    <?php

                    $array = $reader->toArray();
                    // $array = array_diff_key($array, [0,1,2,3]);

                    foreach ($reader->toArray() as $key => $row) {
                        ?>  
                            <tr>
                                <td>
                                    <div class="switch">
                                            <label><input type="checkbox" class="cekCeklis" checked><span class="lever switch-col-red"></span></label>
                                        </div>
                                </td>
                                <td><?php echo $row['id'] ?><input type="hidden" name="id[]" value="<?php echo $row['id'] ?>"></td>
                                <td><?php echo $row['name'] ?><input type="hidden" name="name[]" value="<?php echo $row['name'] ?>"></td>
                                <td><?php echo $row['city'] ?><input type="hidden" name="city[]" value="<?php echo $row['city'] ?>"></td>
                                <td><?php echo $row['abbr'] ?><input type="hidden" name="abbr[]" value="<?php echo $row['abbr'] ?>"></td>
                            </tr>
                        <?php
                    }

                    ?>
                     </tbody>
                     <button type="button" class="btn btn-warning import_execute">SUBMIT</button>
                     </table>
                     </form>
                    <?php

                    // echo "<pre>";
                    // print_r($reader->toArray());
                });

            }else{
                echo "File upload must be (.xlsx) or (.xls) import error!";
            }

        } catch (Exception $e) {
            
            echo "File upload must be (.xlsx) or (.xls) import error!";
        }


    }

    public function airport(){
        $data['dataPort'] = \App\ModelMaster::getDataAirport();
        return view('master/airport')->with($data);
    }

    public function save_the_airport(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::saveAirport($input);

        if($execute){
            echo "Success Saving The Airport";
        }else{
            echo "Failed Saving The Airport";
        }

    }

    public function update_the_airport(Request $request){
        $input = $request->all();

        $execute = \App\ModelMaster::updateAirport($input);

        if($execute){
            echo "Success Updating The Airport";
        }else{
            echo "Failed Updating The Airport";
        }
        

    }

    public function delete_the_airport($id){
        $execute = \App\ModelMaster::DeleteAirport($id);

        if($execute){
            echo "Success Deleting The Airport";
        }else{
            echo "Failed Deleting The Airport";
        }
    }

    



}
