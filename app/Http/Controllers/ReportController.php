<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function customer(){
    	$data['datacust'] = \App\ReportModel::getCust();
    	return view('report/customer')->with($data);
    }

    public function transportation(){
    	$data['dataTransport'] = \App\ReportModel::getTransportation();
    	return view('report/transportation')->with($data);
    }

    public function rute(){
    	$data['dataRute'] = \App\ReportModel::getRute();
    	return view('report/rute')->with($data);
    }

    public function reservation(){
    	$data['datareservation'] = \App\ReportModel::getReservation();
    	return view('report/reservation')->with($data);
    }

    public function depparture(){
        $data['dataTransportList'] = \App\ReportModel::getDataReportDeppTrain();
        return view('report/depparture_list')->with($data);
    }

    public function depparture2(){
        $data['dataTransportList'] = \App\ReportModel::getDataReportDeppPlane();
        return view('report/depparture_list_airplane')->with($data);
    }

    public function earning($tit){
        $data['earning'] = \App\ReportModel::getEarning($tit);
        return view('report/earning')->with($data);
    }

    public function earn_all($tit){
        $earning = \App\ReportModel::getEarning($tit);
        ?>
            <table class="table table-bordered table-striped table-hover dataTable js-exportable table_res_report" style="cursor: cell;">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Date</th>
                        <th>Station</th>
                        <th>Earning</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    $total = 0;
                    foreach ($earning as $key => $value) {
                        $total += $value->earn;
                        ?>
                            <tr>
                                <td><?php echo $i ?>.</td>
                                <td><?php echo date('d/m/Y',strtotime($value->Date)) ?></td>
                                <td><?php echo $value->stat_name ?></td>
                                <td>Rp. <?php echo number_format($value->earn) ?></td>
                            </tr>
                        <?php
                        $i++;
                    } ?>
                   <tr>
                       <td><b>SubTotal</b></td>
                       <td></td>
                       <td></td>
                       <td><b>Rp. <?php echo number_format($total) ?></b></td>
                   </tr>
                </tbody>
            </table>
        <?php
    }

    public function getEarningByDate($d1,$d2,$ev3){
        $earning = \App\ReportModel::getEarningBbyDate($d1,$d2,$ev3);
        ?>
            
            <table class="table table-bordered table-striped table-hover dataTable js-exportable table_res_report" style="cursor: cell;">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Date</th>
                        <th>Station</th>
                        <th>Earning</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    $total = 0;
                    foreach ($earning as $key => $value) {
                        $total += $value->earn;
                        ?>
                            <tr>
                                <td><?php echo $i ?>.</td>
                                <td><?php echo date('d/m/Y',strtotime($value->Date)) ?></td>
                                <td><?php echo $value->stat_name ?></td>
                                <td>Rp. <?php echo number_format($value->earn) ?></td>
                            </tr>
                        <?php
                        $i++;
                    } ?>
                   <tr>
                       <td><b>SubTotal</b></td>
                       <td></td>
                       <td></td>
                       <td><b>Rp. <?php echo number_format($total) ?></b></td>
                   </tr>
                </tbody>
            </table>

        <?php
    }

    public function reservation_all(){
        $datareservation = \App\ReportModel::getReservation();


                                        ?>
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable table_res_report" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Reservation Date</th>
                                            <th>Customer ID</th>
                                            <th>Depart Date</th>
                                            <th>Seat Code</th>
                                            <th>Price</th>
                                            <th>Rute ID</th>
                                            <th>Inputted By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $subTot = 0;
                                            foreach ($datareservation as $key => $value) {
                                                $subTot += $value->price; 
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $value->id ?> </td>
                                                        <td> <?php echo $value->reservation_code ?> </td>
                                                        <td>
                                                        <?php echo date('d/m/Y H:m:s',strtotime($value->reservation_date)) ?>
                                                        </td>
                                                        <td> <?php echo $value->customerid ?></td>
                                                        <td>
                                                        <?php echo date('d/m/Y',strtotime($value->depart_date)) ?>
                                                        </td>
                                                        <td> <?php echo $value->seat_code ?> </td>
                                                        <td>Rp. <b><?php echo number_format($value->price) ?></b></td>
                                                        <td> <?php echo $value->ruteid ?> </td>
                                                        <td> <?php echo $value->userid ?> </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        <tr>
                                            <td><b>SubTotal</b></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Rp. <b><?php echo number_format($subTot) ?></b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                        <?php
        }
    


    public function reservation_filtered($d1,$d2){
        $datareservation = \App\ReportModel::getReservationByDate($d1,$d2);


                                        ?>
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable table_res_report" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Reservation Date</th>
                                            <th>Customer ID</th>
                                            <th>Depart Date</th>
                                            <th>Seat Code</th>
                                            <th>Price</th>
                                            <th>Rute ID</th>
                                            <th>Inputted By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $subTot = 0;
                                            foreach ($datareservation as $key => $value) {
                                                $subTot += $value->price; 
                                                ?>
                                                    <tr>
                                                        <td> <?php echo $value->id ?> </td>
                                                        <td> <?php echo $value->reservation_code ?> </td>
                                                        <td>
                                                        <?php echo date('d/m/Y H:m:s',strtotime($value->reservation_date)) ?>
                                                        </td>
                                                        <td> <?php echo $value->customerid ?></td>
                                                        <td>
                                                        <?php echo date('d/m/Y',strtotime($value->depart_date)) ?>
                                                        </td>
                                                        <td> <?php echo $value->seat_code ?> </td>
                                                        <td>Rp. <b><?php echo number_format($value->price) ?></b></td>
                                                        <td> <?php echo $value->ruteid ?> </td>
                                                        <td> <?php echo $value->userid ?> </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        <tr>
                                            <td><b>SubTotal</b></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Rp. <b><?php echo number_format($subTot) ?></b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                        <?php
    }

    public function periode_transaction(){
        $data['data_send'] = \App\ReportModel::getDataTransactionPeriode();
        return view('report/periode_transaction')->with($data);
    }

    public function TransactionPeriodeFilter($v1,$v2){
        $data_send = \App\ReportModel::getDataTransactionPeriodeFiltered($v1,$v2);
        ?>
            
            <table class="table table-bordered table-striped table-hover dataTable js-exportable table_res_periode_transaction" style="cursor: cell;">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Periode</th>
                        <th>Reservation Count</th>
                        <th>Earning</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $month = array(
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

                        $no = 1;
                        $total = 0;
                        foreach ($data_send as $key => $value) {
                            $trim1 = substr($value->periode,0,4);
                            $trim2 = substr($value->periode,5,7);
                            $total += $value->earning;
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $month[$trim2] ?>, <?php echo $trim1 ?></td>
                                    <td><?php echo $value->counted_reservation ?></td>
                                    <td><?php echo number_format($value->earning) ?></td>
                                </tr>
                            <?php
                            $no++;
                        }
                    ?>
                    <tr>
                        <td>SubTotal</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php echo number_format($total) ?></td>
                    </tr>
                </tbody>
            </table>

        <?php
    }

}
