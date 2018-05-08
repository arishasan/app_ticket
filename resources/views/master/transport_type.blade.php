
@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    List Data Transportation Type
                    <small>Click a data below to showing tools.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_transport_type">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-blue waves-effect" id="btn-add-transport_type">
                                    <i class="material-icons">verified_user</i>
                                    <span>Add Data</span>
                                </button>
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_transport_type" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="showListtransport_type">
                                       <?php
                                            foreach ($listDataTType as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->description }}</td>
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


            <!-- Exportable Table -->
            <div class="row clearfix" hidden="true" id="form_add_transport_type">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-transport_type">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <button type="button" class="btn bg-red waves-effect" id="btn-reset-transport_type">
                                    <i class="material-icons">schedule</i>
                                    <span>Reset</span>
                                </button>
                                <hr/>
                                <center>FORM ADD TRANSPORT TYPE</center>
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
                            <!-- Advanced Form Example With Validation -->
           
                            <form id="wizard_with_validation3" class="ff_transport_type" method="POST" action="{{ url('transport_type/save') }}">
                                {{ csrf_field() }}

                                <h3>Transportation Type Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description" class="form-control" required>
                                            <label class="form-label">Description / Name*</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>Confirmation - Finish</h3>
                                <fieldset>
                                    <center>
                                        <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">All Data Has been Filled.</label>
                                    </center>  
                                </fieldset>
                            </form>
                        
            <!-- #END# Advanced Form Example With Validation -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
       



        <div class="row clearfix" id="form_edit_transport_type" hidden="true">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-transport_type-edit">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <hr/>
                                <center>FORM EDIT TRANSPORT TYPE</center>
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
                            <!-- Advanced Form Example With Validation -->
           
                            <form id="wizard_with_validation4" class="ff_transport_type_edit" method="POST" action="{{ url('transport_type/update') }}">
                                {{ csrf_field() }}

                                <h3>transport_type Information</h3>
                                <fieldset>
                                    <div class="form-group form-float" hidden="true">
                                        <div class="form-line">
                                            <input type="text" name="id_edit" class="form-control" id="id_edit_transport" required>
                                            <label class="form-label">ID*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description_edit" class="form-control" id="description_edit" required>
                                            <label class="form-label">Description / Name*</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>Confirmation - Finish</h3>
                                <fieldset>
                                    <center>
                                        <input id="acceptTerms-3" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-3">All Data Has been Filled.</label>
                                    </center>  
                                </fieldset>
                            </form>
                        
            <!-- #END# Advanced Form Example With Validation -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

@endsection