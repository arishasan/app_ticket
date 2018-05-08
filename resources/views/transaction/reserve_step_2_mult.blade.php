@extends('template/header')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaction</h2>
                <small>Reservation {{ $title }} Step 2</small>
            </div>
            
            @include('tooltips/tooltips')



            <!-- #END# Widgets -->
           

            <!-- CPU Usage -->
            <div class="row clearfix">
				
				<?php
					foreach ($rute as $key => $value) {
						$rute_from = $value->rute_from;
						$rute_to = $value->rute_to;
						$transportation = $value->description;
						$type = $value->type_name;
						$price = $value->price;
						$depart = $value->depart;
						$arrive = $value->arrive;
					}

                    $tit = Request::segment(8);
                    $getRuteAliases2 = \App\TransactionModel::getRuteFromAliases($rute_from,$tit);
                    $getRuteAliases3 = \App\TransactionModel::getRuteFromAliases($rute_to,$tit);
				?>
                <form action="{{ url('transaction/save_multi') }}" method="POST" id="form_transaksi_multi">
                {{ csrf_field() }}
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="card bg-blue">
                        <div class="header">
                        	<h3>Rute/Transportation Information</h3>
                        	<hr>
                            
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <input type="hidden" name="segment" value="{{ Request::segment(8) }}" readonly="true">
                                    <table class="table table-responsive table-bordered" style="color: white;">
                                        <tr>
                                            <td>Depart Date : <input type="text" class="reserveDate form-control" name="reserveData" id="reserveData1" placeholder="Please choose a date..."></td>
                                        </tr>   
                                        <tr>
                                            <input type="hidden" name="reserve_code" value="{{ $reserveCode }}" readonly="true">
                                            <td>Reservation Code : <b>{{ $reserveCode }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Rute : <b>{{ $getRuteAliases2 }}</b> > <b>{{ $getRuteAliases3 }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Transportation : <b>{{ $transportation }}</b> / <b>{{ $type }}</b></td>
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="price" id="price" value="{{ $price }}" readonly="true">
                                            <td>Price / seat : Rp. <b>{{ $price }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Depart Time : <b><?php echo date('g:i A',strtotime($depart)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Arrive Time : <b><?php echo date('g:i A',strtotime($arrive)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="rute_id" value="{{ $rute_id }}" readonly="true">
                                            <td>Rute ID : <b>{{ $rute_id }}</b></td>
                                        </tr>
                                        <tr>
                                            <i id="passe" hidden="true"><?php echo $passenger ?></i>
                                            <td>Passenger : <b><?php echo $passenger ?> <?php echo ($passenger > 1 ? 'Persons':'Person') ?></b></td>
                                        </tr>
                                    </table>
                                </div> 
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="card">
                        <div class="header">
                            <h3>Customer Information</h3>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="identity_card_no" id="identity_card_no2" class="form-control" required>
                                            <label class="form-label">Identity Card No*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="name" id="name" class="form-control" required>
                                            <label class="form-label">Name*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="address" id="address" class="form-control" required>
                                            <label class="form-label">Address*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="phone" id="phone" class="form-control" required>
                                            <label class="form-label">Phone*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <select class="form-control show-tick" name="gender" id="gender" required>
                                                <option value="">-- Please select gender--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" class="form-control btn btn-info waves-effect appCuster">ADD</button>
                                </div> 
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- <p>
                            <code>*Select the seat first, then procced to next step</code>
                        </p>
                        <a href="#" class="form-control btn btn-warning link_next_step">NEXT STEP</a> -->


                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="card">
                        <div class="header">
                            <h3>Customer List</h3>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-responsive table-striped bg-blue" id="table_cust" style="color: black;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Identity Card</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Seat</th>
                                            </tr>
                                        </thead>
                                        <tbody class="appendedCustomer" style="color: black;">
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">SubTotal</td>
                                                <td>Rp. <i class="subTotalSeat"></i></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> 
                        </div>

                        <button type="button" class="btn btn-success waves-effect saveReservationMulti">EXECUTE RESERVATION</button>
                        <!-- <p>
                            <code>*Select the seat first, then procced to next step</code>
                        </p>
                        <a href="#" class="form-control btn btn-warning link_next_step">NEXT STEP</a> -->


                    </div>
                </div>

            </div>
            
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="card bg-orange">
                        <div class="header">
                            <h3>TOOLS PURPOSE</h3>
                            <hr>
                            <div class="row clearfix">
                                <div id="tootlt">
                                    <center><code>Tools will be showed here. once you saved your transaction</code></center>  
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            </form>

            <div class="modal fade" id="modalSeat" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Pick seat for : <i id="custID"></i></h4>
                            <button type="button" class="btn btn-danger waves-effect" id="revokeSeat">REVOKE</button>
                        </div>
                        <div class="modal-body">
                            <div class="row clearfix">
                                <div class="showSeatHere_final_mult">
                                
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


             <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">SEAT : <i id="seat_id"></i></h4>
                        </div>
                        <div class="modal-body">
                            <p id="showedRES">
                                
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancelBooking2" class="btn btn-link waves-effect">CANCEL BOOKING</button>
                            <a href="#" id="print_check" target="_blank" class="btn btn-link waves-effect">PRINT CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>



            
        
            
        </div>
    </section>

@endsection