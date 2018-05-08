@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    List Data transportation
                    <small>Click a data below to showing tools.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_transportation">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-blue waves-effect" id="btn-add-transportation">
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_transportation" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Seat QTY</th>
                                            <th>Transportation Type ID</th>
                                            <th>Transportation Type Description</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Seat QTY</th>
                                            <th>Transportation Type ID</th>
                                            <th>Transportation Type Description</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="showListtransportation">
                                        <?php
                                            foreach ($listTransportation as $key => $value) {
                                                ?>
                                                    
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->code }}</td>
                                                        <td>{{ $value->description }}</td>
                                                        <td>{{ $value->seat_qty }}</td>
                                                        <td>{{ $value->transportType_id }}</td>
                                                        <td>{{ $value->transportType_desc }}</td>
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
            <div class="row clearfix" hidden="true" id="form_add_transportation">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-transportation">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <button type="button" class="btn bg-red waves-effect" id="btn-reset-transportation">
                                    <i class="material-icons">schedule</i>
                                    <span>Reset</span>
                                </button>
                                <hr/>
                                <center>FORM ADD TRANSPORTATION</center>
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
           
                            <form id="wizard_with_validation5" class="ff_transportation" method="POST" action="{{ url('transportation/save') }}">
                                {{ csrf_field() }}

                                <h3>Transportation Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="code" id="code" class="form-control" readonly required>
                                            <label class="form-label">Code*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description" class="form-control" required>
                                            <label class="form-label">Description*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           
                                            <p><b>Seat QTY</b></p>
                                            <div id="sliderQTY"></div>
                                            <div class="m-t-20 font-12"><b>Value: </b><span class="js-nouislider-value"></span></div>
                                
                                            <input type="hidden" min="0" name="seat_qty" id="valueSEAT" class="form-control" required>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="transport_type_id" class="form-control" id="transport_type_id" required readonly>
                                            <label class="form-label">Trasportation Type ID*</label>
                                        </div><br/>
                                        <button type="button" data-color="teal" class="btn bg-teal waves-effect open_modal">SEARCH TRANSPORTATION</button>

                                        <button type="button" class="btn bg-teal waves-effect generateCode">GENERATE CODE TRANSPORTATION</button>
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
       



        <div class="row clearfix" id="form_edit_transportation" hidden="true">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-transportation-edit">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <hr/>
                                <center>FORM EDIT TRANSPORTATION</center>
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
           
                            <form id="wizard_with_validation6" class="ff_transportation_edit" method="POST" action="{{ url('transportation/update') }}">
                                {{ csrf_field() }}

                                <h3>Transportation Information</h3>
                                <fieldset>
                                    <div class="form-group form-float" hidden="true">
                                        <div class="form-line">
                                            <input type="text" name="id_edit" id="transport_id_edit" class="form-control" readonly required>
                                            <label class="form-label">Code*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="code_edit" id="code_edit" class="form-control" readonly required>
                                            <label class="form-label">Code*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="description_edit" id="description_edit" class="form-control" required>
                                            <label class="form-label">Description*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           
                                            <p><b>Seat QTY</b></p>
                                            <div id="sliderQTY1"></div>
                                            <div class="m-t-20 font-12"><b>Value: </b><span class="js-nouislider-value" id="editProg"></span></div>
                                
                                            <input type="hidden" min="0" name="seat_qty_edit" id="valueSEAT_edit" class="form-control valueSEAT_edit" required>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="transport_type_id_edit" id="transport_type_id_edit" class="form-control" id="transport_type_id" required readonly>
                                            <label class="form-label">Trasportation Type ID*</label>
                                        </div><br/>
                                        <button type="button" id="search_transport" data-color="teal" class="btn bg-teal waves-effect open_modal">SEARCH TRANSPORTATION</button>

                                        <button type="button" class="btn bg-teal waves-effect generateCode">GENERATE CODE TRANSPORTATION</button>
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


    <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Find Transportation Type</h4>
                        </div>
                        <div class="modal-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable" id="table_transport" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID Transport Type</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Transport Type</th>
                                            <th>Description</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="showListTransportType">
                                        <?php
                                            foreach ($listTransportationType as $key => $value) {
                                                ?>
                                                    <tr style="color:black;">
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->description }}</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                           

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection