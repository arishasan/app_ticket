@extends('template/header')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaction</h2>
                <small>Reservation {{ $title }} Step 3</small>
            </div>
            
            @include('tooltips/tooltips')

            <div id="tootlt">
                
            </div>

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

                    $getRuteAliases2 = \App\TransactionModel::getRuteFromAliases($rute_from,$title);
                    $getRuteAliases3 = \App\TransactionModel::getRuteFromAliases($rute_to,$title);
				?>

                <form action="{{ url('transaction/save') }}" method="POST" id="saveTransaction">
                {{ csrf_field() }}

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="card bg-blue">
                        <div class="header">
                        	<h3>Information</h3>
                        	<hr>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <input type="hidden" name="segment" value="{{ Request::segment(6) }}" readonly="true">
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
                                            <input type="hidden" name="price" value="{{ $price }}" readonly="true">
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
                                            <input type="hidden" name="seat_code" value="{{ $seat_code }}" readonly="true">
                                            <td>Seat Code : <b style="color: red;text-decoration: underline;">{{ $seat_code }}</b></td>
                                        </tr>
                                    </table>
                                </div> 
                        </div>
						<p>
                            <code>*Fill all customer data on the right panel, then click submit</code>                  
                        </p>
						<button type="button" class="form-control btn btn-success" id="confirm_save">SUBMIT</button>
                        <a href="#" class="form-control btn btn-warning backButton" style="display: none;">BACK</a>


                    </div>
                </div>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                	
                    <div class="card">
                        <div class="header">

                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                   <h3>Customer Information</h3>
                                </div> 
                        </div>
                        <hr>
						<div class="content">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="identity_card_no" id="identity_card_no" class="form-control" required>
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
                        </div>
                    </div>
                    
                    
                    
                </div>

            </div>


            



            </form>
        
            
        </div>
    </section>

@endsection