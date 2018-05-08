
@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    List Data Airport
                    <small>Click a data below to showing tools.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_airport">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-blue waves-effect" id="btn-add-airport">
                                    <i class="material-icons">verified_user</i>
                                    <span>Add Data</span>
                                </button>
                                <!-- <button type="button" class="btn bg-red waves-effect" id="btn-upload-airport" data-color="teal">
                                    <i class="material-icons">input</i>
                                    <span>Import Data</span>
                                </button> -->
                                
                                
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table-airport" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Abbr</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Abbr</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="showListairportClick">
                                      <?php
                                            foreach ($dataPort as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->city }}</td>
                                                        <td>{{ $value->abbr }}</td>
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
            <div class="row clearfix" hidden="true" id="form_add_airport">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-airport">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <button type="button" class="btn bg-red waves-effect" id="btn-reset-airport">
                                    <i class="material-icons">schedule</i>
                                    <span>Reset</span>
                                </button>
                                <hr/>
                                <center>FORM ADD AIRPORT</center>
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
           
                            <form id="wizard_with_validation13" class="ff_airport" method="POST" action="{{ url('airport/save') }}">
                                {{ csrf_field() }}

                                <h3>airport Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description" class="form-control" required>
                                            <label class="form-label">airport Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="city" class="form-control" required>
                                            <label class="form-label">City*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="abbr" id="digit" class="form-control" placeholder="Only 3 digits" required>
                                            <label class="form-label">ABBR*</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>Confirmation - Finish</h3>
                                <fieldset>
                                    <center>
                                        <input id="acceptTerms-6" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-6">All Data Has been Filled.</label>
                                    </center>  
                                </fieldset>
                            </form>
                        
            <!-- #END# Advanced Form Example With Validation -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
       



        <div class="row clearfix" id="form_edit_airport" hidden="true">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-airport-edit">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <hr/>
                                <center>FORM EDIT AIRPORT</center>
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

                            <form id="wizard_with_validation14" class="ff_airport_edite" method="POST" action="<?php echo url('airport/changeUpdate') ?>">
                                {{ csrf_field() }}

                                <h3>airport Information</h3>
                                <fieldset>

                                    <div class="form-group form-float" hidden="true">
                                        <div class="form-line">
                                            <input type="text" name="id_edit" class="form-control" id="id_edit_airport" required>
                                            <label class="form-label">ID*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description_edit" id="description_edit" class="form-control" required>
                                            <label class="form-label">airport Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="city_edit" id="city_edit" class="form-control" required>
                                            <label class="form-label">City*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="abbr_edit" placeholder="Only 3 digits" id="abbr_edit" class="form-control digit_edit" required>
                                            <label class="form-label">ABBR*</label>
                                        </div>
                                </fieldset>

                                <h3>Confirmation - Finish</h3>
                                <fieldset>
                                    <center>
                                        <input id="acceptTerms-11" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-11">All Data Has been Filled.</label>
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


    <div class="modal fade" id="modalUpload-airport" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Import Data airport</h4>
                        </div>
                        <div class="modal-body">
                        <p>
                            Before you perform import data you must Download <a href="{{ url('download_template_airport') }}" class="btn btn-success">This Template</a>
                        </p>
                            <form action="{{ url('upload_airport') }}" method="POST" id="form_upload" enctype="multipart/form-data">
                               {{ csrf_field() }}
                              
                                <input type="file" name="import" id="import_file" class="form-control">
                                <br/>
                               <button type="button" class="btn btn-info save_data_upload">UPLOAD</button>

                            </form>
                            <hr>
                            <div class="showed_upload">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection