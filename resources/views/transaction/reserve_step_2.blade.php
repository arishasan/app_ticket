@extends('template/header')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaction</h2>
                <small>Reservation {{ $title }} Step 2</small>
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
                    $tit = Request::segment(6);
                    $getRuteAliases2 = \App\TransactionModel::getRuteFromAliases($rute_from,$tit);
                    $getRuteAliases3 = \App\TransactionModel::getRuteFromAliases($rute_to,$tit);
				?>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <div class="card bg-blue">
                        <div class="header">
                        	<h3>Rute/Transportation Information</h3>
                        	<hr>
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-responsive table-bordered" style="color: white;">
                                        <tr>
                                        	<td>Rute : <b>{{ $getRuteAliases2 }}</b> > <b>{{ $getRuteAliases3 }}</b></td>
                                        </tr>
                                        <tr>
                                        	<td>Transportation : <b>{{ $transportation }}</b> / <b>{{ $type }}</b></td>
                                        </tr>
                                        <tr>
                                        	<td>Price / seat : Rp. <b>{{ $price }}</b></td>
                                        </tr>
                                        <tr>
                                        	<td>Depart Time : <b><?php echo date('g:i A',strtotime($depart)) ?></b></td>
                                        </tr>
                                        <tr>
                                        	<td>Arrive Time : <b><?php echo date('g:i A',strtotime($arrive)) ?></b></td>
                                        </tr>
                                    </table>
                                </div> 
                        </div>
						<p>
							<code>*Select the seat first, then procced to next step</code>
						</p>
						<a href="#" class="form-control btn btn-warning link_next_step">NEXT STEP</a>


                    </div>
                </div>

            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                	
                    <div class="card">
                        <div class="header">

                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                   <h3>Select Seat</h3>
                                </div> 
                        </div>
						
                    </div>
                    <div class="content">
                        <div class="row clearfix" style="padding-left: 10px;padding-right: 10px;padding-top: 10px;">
                        	<div class="showSeatHere_final">
                        		
                        	</div>
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
                            <button type="button" id="cancelBooking" class="btn btn-link waves-effect">CANCEL BOOKING</button>
                            <a href="#" id="print_check" target="_blank" class="btn btn-link waves-effect">PRINT CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>



            
        
            
        </div>
    </section>

@endsection