<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Ticket Master | Ujikom Project</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('Assets') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="{{ asset('Assets') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ asset('Assets') }}/plugins/node-waves/waves.css" rel="stylesheet" />
    
    <!-- Animation Css -->
    <link href="{{ asset('Assets') }}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('Assets') }}/plugins/morrisjs/morris.css" rel="stylesheet" />

    <link href="{{ asset('Assets') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('Assets') }}/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('Assets') }}/css/style.css" rel="stylesheet">

    <!-- noUISlider Css -->
    
    <link href="{{ asset('Assets') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('Assets') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="{{ asset('Assets') }}/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

     <link href="{{ asset('Assets') }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

     <!-- <link href="{{ asset('Assets') }}/plugins/datatables/jquery.dataTables.css" rel="stylesheet"> -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('Assets') }}/css/themes/all-themes.css" rel="stylesheet" />
    
    <!-- <style>
        #seat_area #wrapSeat{
            width: 500px;
            background: #eee;
            height: auto;
        }
        #seat_area .seat{
            display: block;
            width: 75px;
            float: left;
            height: 50px;
            border: 1px solid #666;
            margin: 10px;
            cursor: pointer;
        }
        #seat_area .default{
            background: #ddd;
        }
        #seat_area .space{
            display: block;
            width: 50px;
            height: 50px;
            float: left;
            /*border: 1px solid #fff;*/
            margin: 10px 0;
        }
        #seat_area .selected{
            background: #ff8c00;
        }
    </style> -->

    @stack('style')
</head>

<body class="theme-red">
@include('template/nav')

@yield('content')


@include('template/footer')

@include('template/jscript')