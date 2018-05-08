<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    
    public function reservation($event){
        $data['title'] = $event;
        $data['list_port'] = \App\TransactionModel::getRuteListFrom_port($event);
        $data['list_port2'] = \App\TransactionModel::getRuteListTo_port($event);
        $data['list'] = \App\TransactionModel::getRuteListFrom($event);
        $data['list2'] = \App\TransactionModel::getRuteListTo($event);
        $data['cekTransportJOINED'] = \App\TransactionModel::getTransport_join();
        return view('transaction/reserve')->with($data);
    }

    public function multiReservation($event2,$event){
        $data['title'] = $event.' MULTI';
        $data['list_port'] = \App\TransactionModel::getRuteListFrom_port($event);
        $data['list_port2'] = \App\TransactionModel::getRuteListTo_port($event);
        $data['list'] = \App\TransactionModel::getRuteListFrom($event);
        $data['list2'] = \App\TransactionModel::getRuteListTo($event);
        $data['cekTransportJOINED'] = \App\TransactionModel::getTransport_join();
        return view('transaction/reserve_multi')->with($data);
    }

    public function reserve_step2($transport,$id_rute,$tit){
        $data['title'] = $tit;
        $data['transport'] = $transport;
        $data['rute_id'] = $id_rute;
        $data['rute'] = \App\TransactionModel::getTransport_join_byID($id_rute);
        return view('transaction/reserve_step_2')->with($data);
    }

    public function reserve_step3($id_rute,$seat_code,$tit){
        $data['title'] = $tit;
        $data['seat_code'] = $seat_code;
        $data['rute_id'] = $id_rute;
        $data['reserveCode'] = \App\TransactionModel::getRandom_code();
        $data['rute'] = \App\TransactionModel::getTransport_join_byID($id_rute);
        return view('transaction/reserve_step_3')->with($data);
    }

    public function cancel_booking($id){
        $query = DB::table('reservation')
                 ->where('id',$id)
                 ->delete();

        if($query) echo "Success Delete Booking"; else echo "Failed Delete Booking";;
    }

    public function get_data_reserve($id,$titl){
        $tit = $titl;
        $customer = \App\TransactionModel::getCustomer($id);

        foreach ($customer as $key => $value) {
            $reserve_id = $value->id;
            $reservation_code = $value->reservation_code;
            $reservation_date = $value->reservation_date ;
            $customerid = $value->customerid ;
            $depart_date = $value->depart_date ;
            $seat_code = $value->seat_code ;
            $price = $value->price ;
            $ruteid = $value->ruteid ;

            $identity_card_no = $value->identity_card_no;
            $name = $value->name;
            $address = $value->address;

            $rute_from = $value->rute_from;
            $rute_to = $value->rute_to;
            $depart = $value->depart;
            $arrive = $value->arrive;


        }

        $getRuteAliases2 = \App\TransactionModel::getRuteFromAliases($rute_from,$tit);
        $getRuteAliases3 = \App\TransactionModel::getRuteFromAliases($rute_to,$tit);

        echo "Reserve ID : <i class='reserve-id-cancel'>".$reserve_id.'</i>';
        echo "<br/>";
        echo "Reserve Code : ".$reservation_code;
        echo "<br/>";
        echo "Reserve Date : ".date('d/m/Y H:m:s',strtotime($reservation_date));
        echo "<br/>";
        echo "Customer ID : ".$customerid;
        echo "<br/>";
        echo "Depart Date : ".date('d/m/Y',strtotime($depart_date));
        echo "<br/>";
        echo "Seat Code : ".$seat_code;
        echo "<br/>";
        echo "Price : ".$price;
        echo "<hr>";

        echo "Identity Card : ".$identity_card_no;
        echo "<br/>";
        echo "Name : ".$name;
        echo "<br/>";
        echo "Address : ".$address;
        echo "<hr>";

        echo "Rute From : <small>".$getRuteAliases2."</small>";
        echo "<br/>";
        echo "Rute To : <small>".$getRuteAliases3."</small>";
        echo "<br/>";
        echo "Depart Time : ".$depart;
        echo "<br/>";
        echo "Arrive Time : ".$arrive;



    }

    public function save_em_up(Request $request){
        $input = $request->all();

        $execute = \App\TransactionModel::save_transaction($input);

        $url = url('transaction/reservation').'/'.$input['segment'];

        if($execute != 'zero'){

            echo '<div class="alert alert-success">
        <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Transaction Saved Click <a href="'.url('checkout_transaction').'/'.$execute.'/'.$input['segment'].'" class="btn btn-info" target="_blank">PRINT CHECKOUT</a> To PrintOut Checkout <hr> <a href="'.$url.'" class="form-control btn btn-warning backButton">BACK TO STEP 1</a>
    </div>';

        }else{
            echo '<div class="alert alert-danger">
        <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Transaction failed. Its probably the customer has booked another seat. <hr><a href="'.$url.'" class="btn btn-warning backButton">BACK TO STEP 1</a>
    </div>';
        }

        // echo '<a href="'.$url.'" class="form-control btn btn-warning backButton">BACK TO STEP 1</a>';

    }

    public function getNameCustomer($id){
        $retu = '';
        $execute = DB::table('customer')->where('identity_card_no',$id)->get();
        foreach ($execute->toArray() as $key => $value) {
            $retu = $value->name;
        }
        echo $retu;
    }

    public function getAddressCustomer($id){
        $retu = '';
        $execute = DB::table('customer')->where('identity_card_no',$id)->get();
        foreach ($execute->toArray() as $key => $value) {
            $retu = $value->address;
        }
        echo $retu;
    }

    public function getPhoneCustomer($id){
        $retu = '';
        $execute = DB::table('customer')->where('identity_card_no',$id)->get();
        foreach ($execute->toArray() as $key => $value) {
            $retu = $value->phone;
        }
        echo $retu;
    }

    public function getGenderCustomer($id){
        $retu = '';
        $execute = DB::table('customer')->where('identity_card_no',$id)->get();
        foreach ($execute->toArray() as $key => $value) {
            $retu = $value->gender;
        }
        echo $retu;
    }

    public function printCheckout($id,$tit){
        $data['title'] = $tit;
        $data['customer'] = \App\TransactionModel::getCustomer($id);
        return view('mockup/checkout')->with($data);
    }

    public function getSeatByIDTransport($id,$rute_id_send,$type){
        $kode = $id;
        $type_trans = $type;
        $rute = $rute_id_send;
        $qty = '';
        $trim = '';
        $code = '';
        $id = '';
        $transport_id = '';
        $rute_id = '';
        $dataRray1 = '';
        $dataRray12 = '';
        $reserve_id = '';
        $inisial = '';

              $cekTransport = \App\TransactionModel::getTransport($kode,$rute,$type_trans);


              foreach ($cekTransport as $key => $value) {
                  $qty = $value->seat_qty;
                  $transport_id = $value->id;
                  $rute_id = $value->rute_id;
                  $trim = substr($value->description,0,2);
                  $code = substr($value->code,0,3);
                  $id = substr($value->id,6,11);
              }

              for ($i=1; $i <= $qty / 4; $i++) {
                
                for ($ii=1; $ii <= 4 ; $ii++) { 
                    
                    switch ($ii) {
                        case '1':
                            $inisial = 'A';
                            break;

                        case '2':
                            $inisial = 'B';
                            break;

                        case '3':
                            $inisial = 'C';
                            break;

                        case '4':
                            $inisial = 'D';
                            break;
                        
                        default:
                            $inisial = 'A';
                            break;
                    }

                    $seat_code = $trim.$id.'_'.$i.$inisial;

                    $checkISTHERESeatUsed = \App\TransactionModel::checkSeat($seat_code,$transport_id,$rute_id);

                               
                    foreach ($checkISTHERESeatUsed as $key => $value){
                             $dataRray1 = $value->seat_code; 
                             $reserve_id = $value->id;
                    }

                    if($dataRray1 == $seat_code){

                                    ?>
                                        
                                        <div class="col-sm-3 seatLISTTick_err">
                                            <div class="info-box hover-expand-effect" style="cursor: pointer;">
                                                
                                                <div class="content bg-red" style="cursor: pointer;">
                                                   <div class="text"><small>BOOKED BY</small></div>
                                                    <div class="number" style="font-size: 10px;font-weight: bold;"><i class="reserve_id"><?php echo $reserve_id ?></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php

                                }else{

                            ?>
                                
                            <div class="col-sm-3 seatLISTTick">
                                <div class="info-box hover-expand-effect" style="cursor: pointer;">
                                    
                                    <div class="content iconFA" style="cursor: pointer;">
                                        <div class="text"><small>AVAILABLE</small></div>
                                        <div class="number" style="font-size: 10px;font-weight: bold;"><?php echo $seat_code ?></div>
                                    </div>
                                </div>
                            </div>

                        
                        <?php

                             }

                } 
                // TUTUP FOR AWAL

              }
              // TUTUP FOR
               
    }
    // TUTUP AKHIR
    

    public function getRuteFromTo($ev1,$ev2,$tit){
        $title = $tit;
        $data = \App\TransactionModel::getRuteByFromAndTO($ev1,$ev2,$title);
        date_default_timezone_set('Asia/Jakarta');

        $time = array(
        	'00' => 24,
        	'01' => 1,
        	'02' => 2,
        	'03' => 3,
        	'04' => 4,
        	'05' => 5,
        	'06' => 6,
        	'07' => 7,
        	'08' => 8,
        	'09' => 9,
        	'10' => 10,
        	'11' => 11,
        	'12' => 12,
        	'13' => 13,
        	'14' => 14,
        	'15' => 15,
        	'16' => 16,
        	'17' => 17,
        	'18' => 18,
        	'19' => 19,
        	'20' => 20,
        	'21' => 21,
        	'22' => 22,
        	'23' => 23,
        );

        foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value->description ?></td>
                    <td><?php echo $value->type_name ?></td>
                    <td><?php echo date('g:i A',strtotime($value->depart)) ?></td>
                    <td><?php echo date('g:i A',strtotime($value->arrive)) ?></td>
                    <td><?php echo $value->price ?></td>
                    <td>
                    	<?php if($time[substr(date('H:m:s'),0,2)] > $time[substr(date('H:m:s',strtotime($value->depart)),0,2)]){ ?>
                    		<a href="#" class="btn btn-danger">OUT OF TIME <?php echo date('g:i A')?></a> 
                    		
                    	<?php }else{
                    		?>
                    		<a href="<?php echo url('transaction/reserve/step_2') ?>/<?php echo $value->id ?>/<?php echo $value->rute_id ?>/<?php echo $tit ?>" class="btn btn-warning">RESERVE NOW</a>
                    		
                    		<?php
                    	} ?>
                    </td>
                </tr>
            <?php
        }

    }


    public function getRuteFromTo_multi($ev1,$ev2,$pass,$tit){
        $title = $tit;
        $data = \App\TransactionModel::getRuteByFromAndTO($ev1,$ev2,$title);
        date_default_timezone_set('Asia/Jakarta');
        $time = array(
        	'00' => 24,
        	'01' => 1,
        	'02' => 2,
        	'03' => 3,
        	'04' => 4,
        	'05' => 5,
        	'06' => 6,
        	'07' => 7,
        	'08' => 8,
        	'09' => 9,
        	'10' => 10,
        	'11' => 11,
        	'12' => 12,
        	'13' => 13,
        	'14' => 14,
        	'15' => 15,
        	'16' => 16,
        	'17' => 17,
        	'18' => 18,
        	'19' => 19,
        	'20' => 20,
        	'21' => 21,
        	'22' => 22,
        	'23' => 23,
        );

        foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value->description ?></td>
                    <td><?php echo $value->type_name ?></td>
                    <td><?php echo date('g:i A',strtotime($value->depart)) ?></td>
                    <td><?php echo date('g:i A',strtotime($value->arrive)) ?></td>
                    <td><?php echo $value->price ?></td>
                    <td>
                    	<?php if($time[substr(date('H:m:s'),0,2)] > $time[substr(date('H:m:s',strtotime($value->depart)),0,2)]){ ?>
                    		<a href="#" class="btn btn-danger">OUT OF TIME <?php echo date('g:i A')?></a> 
                    		
                    	<?php }else{
                    		?>
                    		<a href="<?php echo url('transaction/reservation_mult/MULTI/step_2') ?>/<?php echo $value->id ?>/<?php echo $value->rute_id ?>/<?php echo $pass ?>/<?php echo $tit ?>" class="btn btn-warning">RESERVE NOW</a>
                    		<?php
                    	} ?>
                    </td>
                    
                </tr>
            <?php
        }

    }


    public function reserve_step2_multi($transport,$id_rute,$pass,$tit){
        $data['title'] = $tit.' MULTI';
        $data['passenger'] = $pass;
        $data['transport'] = $transport;
        $data['rute_id'] = $id_rute;
        $data['rute'] = \App\TransactionModel::getTransport_join_byID($id_rute);
        $data['reserveCode'] = \App\TransactionModel::getRandom_code();
        return view('transaction/reserve_step_2_mult')->with($data);
    }

    public function checkCustomer($id){
        date_default_timezone_set('Asia/Jakarta');
        $query = DB::table('customer')
                 ->select('customer.*')
                 ->whereRaw('customer.identity_card_no = "'.$id.'" AND customer.id IN(SELECT customerid FROM reservation WHERE depart_date >= "'.date('Y-m-d').'")')
                 ->get();
        $data = count($query->toArray());

        if($data > 0){
            echo "This Customer Have been already reserving";
        }else{
            echo "Next. Up to you";
        }

    }

    public function save_em_up_multi(Request $request){
        $input = $request->all();

        $execute = \App\TransactionModel::save_transaction_multi($input);

        $url = url('transaction/reservation_mult').'/MULTI/'.$input['segment'];

        if($execute != 'zero'){

            

            foreach ($execute as $key => $value) {
                ?>
                    <a href="<?php echo url('checkout_transaction') ?>/<?php echo $value ?>/<?php echo $input['segment'] ?>" class="btn btn-info" target="_blank">PRINT CHECKOUT <?php echo $key+1 ?></a>
                <?php
            }
            ?>
                    <hr>
                    <a href="<?php echo $url ?>" class="btn btn-danger backButton">BACK TO STEP 1</a>
            <?php


        }else{
            echo '<a href="'.$url.'" class="btn btn-danger backButton">BACK TO STEP 1</a>';
        }

        // echo '<a href="'.$url.'" class="form-control btn btn-warning backButton">BACK TO STEP 1</a>';

    }

    public function checkTanggal($tgl){
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_real = date('Y-m-d',strtotime($tgl));
        $tgl = date('Y-m-d');

        $array_month = array(
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        );

        $real = date('d').'-'.$array_month[date('m')].'-'.date('Y');

        if($tanggal_real < $tgl){
            echo "Date can't be less than ". $real;
        }else{
            echo "No";
        }

    }


}
