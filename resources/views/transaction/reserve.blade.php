@extends('template/header')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaction</h2>
                <small>Reservation {{ $title }} Step 1</small>
            </div>
            
            @include('tooltips/tooltips')

            <div id="tootlt">
                
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">

                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12" style="height: auto">
                    @if(Request::segment(3) == 'airplane')
                    <div class="text">RUTE FROM</div>
                    <select class="form-control show-tick" name="depart_from" id="depart_from" data-live-search="true" style="color:black;">
                                <option value="">[ Pick here ]</option>
                                @foreach($list_port as $val)
                                <option value="{{ $val->id }}">{{ strtoupper($val->name) }}&nbsp;({{ strtoupper($val->abbr) }})&nbsp;{{ strtoupper($val->city) }}</option>
                                @endforeach
                        </select>

                    @else
                    
                    <div class="text">RUTE FROM</div>
                        <select class="form-control show-tick" name="depart_from" id="depart_from" data-live-search="true" style="color:black;">
                                <option value="">[ Pick here ]</option>
                                @foreach($list as $val)
                                <option value="{{ $val->id }}">{{ strtoupper($val->name) }}&nbsp;({{ strtoupper($val->abbr) }})&nbsp;{{ strtoupper($val->city) }}</option>
                                @endforeach
                        </select>

                    @endif
                </div>

                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    @if(Request::segment(3) == 'airplane')
                    <div class="text">RUTE TO</div>
                        <select class="form-control show-tick" name="depart_to" id="depart_to" data-live-search="true" style="color:black;">
                                <option value="">[ Pick here ]</option>
                                @foreach($list_port2 as $val)
                                <option value="{{ $val->id }}">{{ strtoupper($val->name) }}&nbsp;({{ strtoupper($val->abbr) }})&nbsp;{{ strtoupper($val->city) }}</option>
                                @endforeach
                            </select>

                    @else
                    
                    <div class="text">RUTE TO</div>
                        <select class="form-control show-tick" name="depart_to" id="depart_to" data-live-search="true" style="color:black;">
                                <option value="">[ Pick here ]</option>
                                @foreach($list2 as $val)
                                <option value="{{ $val->id }}">{{ strtoupper($val->name) }}&nbsp;({{ strtoupper($val->abbr) }})&nbsp;{{ strtoupper($val->city) }}</option>
                                @endforeach
                            </select>

                    @endif

                    </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="text">PROCESS</div>
                               <button type="button" class="form-control btn btn-default" id="cariRute">SEARCH</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

            <!-- #END# Widgets -->
           

            <!-- CPU Usage -->
            <div class="row clearfix">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-responsive table-stripped">
                                        <thead>
                                            <th>Transportation</th>
                                            <th>Type</th>
                                            <th>Depart Time</th>
                                            <th>Arrive Time</th>
                                            <th>Price</th>
                                            <th>#</th>
                                        </thead>
                                        <tbody id="listTransportation_rute">
                                            <tr>
                                                <td colspan="6"><center><code>Result Showed Here</code></center></td>
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