@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Transaction Per Periode
                    <small>Just click any button upside data table.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_rute">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Choose your export type.
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                            <span>Year</span>
                            <select id="year_periode" class="form-control">
                                <option value="">[Pick year]</option>
                               <?php
                                date_default_timezone_set('Asia/Jakarta');
                                ?>
                                <option value="<?php echo date('Y',strtotime('-2 years')) ?>"><?php echo date('Y',strtotime('-2 years')) ?></option>
                                <option value="<?php echo date('Y',strtotime('-1 year')) ?>"><?php echo date('Y',strtotime('-1 year')) ?></option>
                                <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
                                <?php
                             ?>
                            </select>
                            <br/>

                            <span>Month</span>
                            <select id="month_periode" class="form-control">
                                <option value="">[Pick month]</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <br/>
                            <br/>

                            <button type="button" class="btn btn-info waves-effect" id="show_filter_per_trans">Show By Filter</button>
                            <button type="button" class="btn btn-success waves-effect" id="show_all_per_trans">Show All</button>
                            <hr>
            
                            <div class="table-responsive" id="showedTableFilterTransactionPeriode">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       



      
        </div>
    </section>



@endsection