
<?php
    $data = \App\TransactionModel::checkUserAll();

    $level = '';
    $fullname = '';
    $username = '';
    foreach ($data as $key => $value) {
        $level = $value->level;
        $fullname = $value->fullname;
        $username = $value->username;
        $idUSER = $value->id;
    }
?>

<div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ url('/') }}">Ticket Master | Airplanes & Trains</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('Assets') }}/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $fullname }}</div>
                    <div class="email">{{ $level }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>{{ $username }}</a></li>
                            <li role="seperator" class="divider"></li>
                            <li>
                                <form action="{{ url('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                        <center><button type="submit" class="btn btn-success"><i class="material-icons">input</i>Sign Out</button></center>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    @if(empty(Request::segment(1)))
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="{{ url('/') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    @if($level == 'SUPER ADMIN' OR $level == 'Admin')

                    @if(Request::segment(1) == 'master')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Data Master</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Request::segment(2) == 'rute')
                            <li class="active">
                            @else
                            <li>
                            @endif
                            
                                <a href="{{ url('master/rute') }}">Rute</a>
                            </li>

                            @if(Request::segment(2) == 'transportation_type')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('master/transportation_type') }}">Transportation Type</a>
                            </li>

                            @if(Request::segment(2) == 'transportation')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('master/transportation') }}">Transportation</a>
                            </li>
                            
                            @if(Request::segment(2) == 'stasiun')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('master/stasiun') }}">Station</a>
                            </li>


                            @if(Request::segment(2) == 'airport')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('master/airport') }}">Airport</a>
                            </li>

                        </ul>
                    </li>

                    @else

                    @endif


                    
                    @if(Request::segment(1) == 'transaction')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Transaction</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Request::segment(3) == 'train' OR Request::segment(6) == 'train')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('transaction/reservation') }}/train">Reservation Train</a>
                            </li>

                            @if(Request::segment(4) == 'train' OR Request::segment(8) == 'train' AND Request::segment(3) == 'MULTI')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('transaction/reservation_mult') }}/MULTI/train">Reservation Train (B)</a>
                            </li>

                            @if(Request::segment(3) == 'airplane' OR Request::segment(6) == 'airplane')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('transaction/reservation') }}/airplane">Reservation Airplane</a>
                            </li>


                            @if(Request::segment(4) == 'airplane' OR Request::segment(8) == 'airplane' AND Request::segment(3) == 'MULTI')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('transaction/reservation_mult') }}/MULTI/airplane">Reservation Airplane (B)</a>
                            </li>

                        </ul>
                    </li>
    
                    @if($level == 'SUPER ADMIN' OR $level == 'Admin')

                    @if(Request::segment(1) == 'report')
                    <li class="active">
                    @else
                    <li>
                    @endif
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Report</span>
                        </a>
                        <ul class="ml-menu">

                            @if(Request::segment(2) == 'report_customer')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_customer') }}">Customer</a>
                            </li>

                            @if(Request::segment(2) == 'report_transportation')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_transportation') }}">Transportation</a>
                            </li>

                            @if(Request::segment(2) == 'report_rute')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_rute') }}">Rute</a>
                            </li>

                            @if(Request::segment(2) == 'report_reservation')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_reservation') }}">Reservation</a>
                            </li>

                            @if(Request::segment(2) == 'report_depparture')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_depparture/train') }}">Depparture List / Reserved Seat Train</a>
                            </li>

                            @if(Request::segment(2) == 'report_depparture2')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_depparture2/airplane') }}">Depparture List / Reserved Seat Airplane</a>
                            </li>
                            
                            @if(Request::segment(2) == 'report_earning' AND Request::segment(3) == 'station')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_earning/station') }}">Earning Station</a>
                            </li>

                            @if(Request::segment(2) == 'report_earning' AND Request::segment(3) == 'airport')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_earning/airport') }}">Earning Airport</a>
                            </li>

                            @if(Request::segment(2) == 'report_periode_transaction')
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="{{ url('report/report_periode_transaction') }}">Transaction Per Periode</a>
                            </li>

                        </ul>
                    </li>
                    @else

                    @endif
                    <li>
                        <a href="#" class="userModal" data-color="teal">
                            <i class="material-icons">update</i>
                            <span>User Setting</span>
                        </a>
                    </li>


                </ul>
            </div>

            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">Ticket Master - An UJIKOM Project</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>


    <div class="modal fade" id="mdModalUser" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">List Users</h4>
                        </div>
                        <div class="modal-body">
                        @if($level == 'SUPER ADMIN' OR $level == 'Admin')
                        <a href="#" class="btn btn-success addUserModal"data-color="default">ADD DATA</a>
                        <hr>
                        @else

                        @endif
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_user">
                                    <thead>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Level</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Level</th>
                                            <th>Tools</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color:black; text-align: center;" id="listUser">
                                        <?php
                                            $dataUser = \App\ModelMaster::getAllUser($level);
                                            foreach ($dataUser as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id_user }}</td>
                                                        <td>{{ $value->username }}</td>
                                                        <td>{{ $value->fullname }}</td>
                                                        <td>{{ $value->level }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info edit_user" data-color="default">ED</a>  
                                                            @if($level == 'SUPER ADMIN' OR $level == 'Admin')
                                                                <?php
                                                                    $userA = \App\ModelMaster::takeID($value->id);
                                                                ?>
                                                                @if($idUSER == $userA)

                                                                @else
                                                                | <a href="#" class="btn btn-danger delete_user">DE</a>
                                                                @endif
                                                            @else

                                                            @endif
                                                        </td>
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




            <div class="modal fade" id="mdModalUser_add" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">ADD User</h4>
                        </div>
                        <form action="{{ url('saveUser') }}" method="POST" id="form_user">
                            {{ csrf_field() }}
                        <div class="modal-body">
                                            
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="username" id="username" class="form-control" required>
                                            <label class="form-label">Username*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <label class="form-label">Password*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="c-password" id="c-password" class="form-control" required>
                                            <label class="form-label">Confirm Password*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="fullname" id="fullname" class="form-control" required>
                                            <label class="form-label">Fullname*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <select class="form-control" name="level" id="level" required>
                                                <option value="">-- Please select level--</option>
                                                @if($level == 'SUPER ADMIN' OR $level == 'Admin')
                                                <option value="Admin">Admin</option>
                                                @endif
                                                <option value="Operator">Operator</option>
                                                @if($level == 'SUPER ADMIN')
                                                <option value="SUPER ADMIN">SUPER ADMIN</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
    
                        </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success waves-effect" id="save_user">SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="mdModalUser_edit" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit User</h4>
                        </div>
                        <form action="{{ url('updateUser') }}" method="POST" id="form_user_edit">
                            {{ csrf_field() }}
                        <div class="modal-body">

                                    <div class="form-group form-float" hidden="true">
                                        <div class="form-line">
                                            <input type="text" name="id_edit" id="id_edit" class="form-control" required>
                                            <label class="form-label">ID*</label>
                                        </div>
                                    </div>
                                            
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="username_edit" id="username_edit" class="form-control" required>
                                            <label class="form-label">Username*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password_edit" id="password_edit" class="form-control" required>
                                            <label class="form-label">Password*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="c-password_edit" id="c-password_edit" class="form-control" required>
                                            <label class="form-label">Confirm Password*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="fullname_edit" id="fullname_edit" class="form-control" required>
                                            <label class="form-label">Fullname*</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <select class="form-control" name="level_edit" id="level_edit" required>
                                                <option value="">-- Please select level--</option>
                                                @if($level == 'SUPER ADMIN' OR $level == 'Admin')
                                                <option value="Admin">Admin</option>
                                                @endif
                                                <option value="Operator">Operator</option>
                                                @if($level == 'SUPER ADMIN')
                                                <option value="SUPER ADMIN">SUPER ADMIN</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
    
                        </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success waves-effect" id="save_user_edit">SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>