@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Reservation
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
                            <span>First Date</span>
                            <input type="date" class="form-control" id="f_date">
                            <br/>
                            <span>Second Date</span>
                            <input type="date" class="form-control" id="s_date">
                            <br/>
                            <button type="button" class="btn btn-info waves-effect" id="show_rep_res_date">Show By Date</button>
                            <button type="button" class="btn btn-success waves-effect" id="show_rep_res_all">Show All</button>
                            <hr>
            
                            <div class="table-responsive" id="showedReservationReport">
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
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->reservation_code }}</td>
                                                        <td>
                                                        <?php echo date('d/m/Y H:m:s',strtotime($value->reservation_date)) ?>
                                                        </td>
                                                        <td>{{ $value->customerid }}</td>
                                                        <td>
                                                        <?php echo date('d/m/Y',strtotime($value->depart_date)) ?>
                                                        </td>
                                                        <td>{{ $value->seat_code }}</td>
                                                        <td>Rp. <b><?php echo number_format($value->price) ?></b></td>
                                                        <td>{{ $value->ruteid }}</td>
                                                        <td>{{ $value->userid }}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       



      
        </div>
    </section>



@endsection