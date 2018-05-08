@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Depparture List / Seat Reserved / Another Information Train Only
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
                            <!-- <span>First Date</span>
                            <input type="date" class="form-control" id="f_date">
                            <br/>
                            <span>Second Date</span>
                            <input type="date" class="form-control" id="s_date">
                            <br/>
                            <button type="button" class="btn btn-info waves-effect" id="show_rep_res_date">Show By Date</button>
                            <button type="button" class="btn btn-success waves-effect" id="show_rep_res_all">Show All</button>
                            <hr> -->
            
                            <div class="table-responsive" id="showedReservationReport">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable table_dep_report" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Depart From</th>
                                            <th>Transport Name</th>
                                            <th>Depart To</th>
                                            <th>Time</th>
                                            <th>Price</th>
                                            <th>Seat</th>
                                            <th>Seat Reserved</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($dataTransportList as $key => $value) {
                                                
                                                $depart_from = \App\ReportModel::getRuteFromAliases($value->rute_from,Request::segment(3));
                                                $depart_to = \App\ReportModel::getRuteFromAliases($value->rute_to,Request::segment(3));
                                                $reserved = \App\ReportModel::getReservedSeat($value->ruteid);

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $depart_from ?></td>
                                                        <td>
                                                            <?php echo $value->description ?>
                                                        </td>
                                                        <td>
                                                        <?php echo $depart_to ?>
                                                        </td>
                                                        <td><?php echo date('g:i A',strtotime($value->depart)) ?> - <?php echo date('g:i A',strtotime($value->arrive)) ?></td>
                                                        <td>
                                                        <?php echo $value->price ?>
                                                        </td>
                                                        <td><?php echo $value->seat_qty ?></td>
                                                        <td><?php echo $reserved ?></td>
                                                    </tr>
                                                <?php
                                                $i++;
                                            }
                                        ?>
                                       
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