@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Rute
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_rute_report" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rute From</th>
                                            <th>Rute To</th>
                                            <th>Depart Time</th>
                                            <th>Arrive Time</th>
                                            <th>Price</th>
                                            <th>Transportation ID</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rute From</th>
                                            <th>Rute To</th>
                                            <th>Depart Time</th>
                                            <th>Arrive Time</th>
                                            <th>Price</th>
                                            <th>Transportation ID</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach ($dataRute as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->rute_from }}</td>
                                                        <td>{{ $value->rute_to }}</td>
                                                        <td>{{ $value->depart }}</td>
                                                        <td>{{ $value->arrive }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        <td>{{ $value->transportationid }}</td>
                                                    </tr>
                                                <?php
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