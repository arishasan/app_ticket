@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    List Data Rute
                    <small>Click a data below to showing tools.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_rute">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-blue waves-effect" id="btn-add-rute">
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_rute" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rute Form</th>
                                            <th>Rute To</th>
                                            <th>Time Depart</th>
                                            <th>Time Arrive</th>
                                            <th>Price</th>
                                            <th>Transportation ID</th>
                                            <th>Transportation Type</th>
                                            <th>Name Type</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rute Form</th>
                                            <th>Rute To</th>
                                            <th>Time Depart</th>
                                            <th>Time Arrive</th>
                                            <th>Price</th>
                                            <th>Transportation ID</th>
                                            <th>Transportation Type</th>
                                            <th>Name Type</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="showListrute">
                                        <?php
                                            foreach ($datarute as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->rute_from }}</td>
                                                        <td>{{ $value->rute_to }}</td>
                                                        <td>{{ $value->depart }}</td>
                                                        <td>{{ $value->arrive }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        <td>{{ $value->trasport_id }}</td>
                                                        <td>{{ $value->type_id }}</td>
                                                        <td>{{ $value->name_type }}</td>
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
            <div class="row clearfix" hidden="true" id="form_add_rute">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-rute">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <button type="button" class="btn bg-red waves-effect" id="btn-reset-rute">
                                    <i class="material-icons">schedule</i>
                                    <span>Reset</span>
                                </button>
                                <hr/>
                                <center>FORM ADD RUTE</center>
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
           
                            <form id="wizard_with_validation1" class="ff_rute" method="POST" action="{{ url('rute/save') }}">
                                {{ csrf_field() }}

                                <h3>Rute Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="rute_from" id="rute_from" class="form-control" required>
                                            <label class="form-label">Rute From*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="rute_to" id="rute_to" class="form-control" required>
                                            <label class="form-label">Rute To*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="time" name="depart" class="form-control" required>
                                            <label class="form-label">Depart*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="time" name="Arrive" class="form-control" required>
                                            <label class="form-label">Arrive*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" min="0" name="price" class="form-control" required>
                                            <label class="form-label">Price*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="transport_id" class="form-control" id="transport_id" required readonly>
                                            <label class="form-label">Trasportation ID*</label>
                                        </div><br/>
                                        <button type="button" id="search_transport" data-color="teal" class="btn bg-teal waves-effect open_modal">SEARCH TRANSPORTATION</button>
                                        <button type="button" id="search_rute_from" data-color="teal" class="btn bg-teal waves-effect open_modal2">SEARCH RUTE FROM</button>
                                        <button type="button" id="search_rute_to" data-color="teal" class="btn bg-teal waves-effect open_modal3">SEARCH RUTE TO</button>
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
       



        <div class="row clearfix" id="form_edit_rute" hidden="true">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <button type="button" class="btn bg-red waves-effect" id="btn-close-rute-edit">
                                    <i class="material-icons">close</i>
                                    <span>Close</span>
                                </button>
                                <hr/>
                                <center>FORM EDIT RUTE</center>
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
           
                            <form id="wizard_with_validation2" class="ff_rute_edit" method="POST" action="{{ url('rute/update') }}">
                                {{ csrf_field() }}

                                <h3>Rute Information</h3>
                                <fieldset>
                                    <div class="form-group form-float" hidden="true">
                                        <div class="form-line">
                                            <input type="text" name="id_edit" class="form-control" id="edit_id" required>
                                            <label class="form-label">ID*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="rute_from_edit" class="form-control" id="rute_from_edit" required>
                                            <label class="form-label">Rute From*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="rute_to_edit" class="form-control" id="rute_to_edit" required>
                                            <label class="form-label">Rute To*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="time" name="depart_edit" class="form-control" id="timeDepartEdit" required>
                                            <label class="form-label">Depart*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="time" name="Arrive_edit" class="form-control" id="timeArriveEdit" required>
                                            <label class="form-label">Arrive*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" min="0" name="price_edit" class="form-control" id="price_edit" required>
                                            <label class="form-label">Price*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="transport_id_edit" class="form-control" id="transport_id_edit" required readonly>
                                            <label class="form-label">Trasportation ID*</label>
                                        </div><br/>
                                        <button type="button" data-color="teal" class="btn bg-teal waves-effect open_modal">SEARCH TRANSPORTATION</button>
                                        <button type="button" data-color="teal" class="btn bg-teal waves-effect open_modal2">SEARCH RUTE FROM</button>
                                        <button type="button" data-color="teal" class="btn bg-teal waves-effect open_modal3">SEARCH RUTE TO</button>
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
                            <h4 class="modal-title" id="defaultModalLabel">Find Transportation</h4>
                        </div>
                        <div class="modal-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable" id="table_transport" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID Transport</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Seat QTY</th>
                                            <th>Transportation Type ID</th>
                                            <th>Transportation Type Name</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Transport</th>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Seat QTY</th>
                                            <th>Transportation Type ID</th>
                                            <th>Transportation Type Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="showListTransport">
                                        <?php
                                            foreach ($dataTransport as $key => $value) {
                                                ?>
                                                    <tr style="color:black;text-align: center;">
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->code }}</td>
                                                        <td>{{ $value->description }}</td>
                                                        <td>{{ $value->seat_qty }}</td>
                                                        <td>{{ $value->transportation_typeid }}</td>
                                                        <td>{{ $value->nameType }}</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="mdModal_from" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Find Rute From</h4>
                        </div>
                        <div class="modal-body">
                            <span>Type</span>
                            <select id="showedBy" class="form-control">
                                <option value="Station">Station</option>
                                <option value="Airport">Airport</option>
                            </select>
                            <hr>
                            <div id="resultShowed">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable table_rute_from" id="table_rute_from" style="cursor: cell;">
                                        <thead>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="showListStatFrom">
                                            <?php
                                                foreach ($dataStation as $key => $value) {
                                                    ?>
                                                        <tr style="color:black;text-align: center;">
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

                            <div id="resultShowed2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable table_rute_from" style="cursor: cell;">
                                        <thead>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="showListStatFrom">
                                            <?php
                                                foreach ($dataAirport as $key => $value) {
                                                    ?>
                                                        <tr style="color:black;text-align: center;">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="modal fade" id="mdModal_to" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Find Rute To</h4>
                        </div>
                        <div class="modal-body">
                            <span>Type</span>
                            <select id="showedBy2" class="form-control">
                                <option value="Station">Station</option>
                                <option value="Airport">Airport</option>
                            </select>
                            <hr>
                            <div id="resultShowed3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable table_rute_to" id="table_rute_to" style="cursor: cell;">
                                        <thead>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="showListStatto">
                                            <?php
                                                foreach ($dataStation as $key => $value) {
                                                    ?>
                                                        <tr style="color:black;text-align: center;">
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

                            <div id="resultShowed4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable table_rute_to" id="table_rute_to" style="cursor: cell;">
                                        <thead>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Station</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th>Abbr</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="showListStatto">
                                            <?php
                                                foreach ($dataAirport as $key => $value) {
                                                    ?>
                                                        <tr style="color:black;text-align: center;">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


@endsection