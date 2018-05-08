@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Earning
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
                            <button type="button" class="btn btn-info waves-effect" id="show_filter_earning">Show By Date</button>
                            <button type="button" class="btn btn-success waves-effect" id="show_all_earning">Show All</button>
                            <hr>
            
                            <div class="table-responsive" id="showedTableFilterEarn">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       



      
        </div>
    </section>



@endsection