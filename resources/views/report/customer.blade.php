@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Customer
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_customer" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Identity Card No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Identity Card No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach ($datacust as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->identity_card_no }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->address }}</td>
                                                        <td>{{ $value->phone }}</td>
                                                        <td>{{ $value->gender }}</td>
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