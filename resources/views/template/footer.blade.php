
    <!-- Jquery Core Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('Assets') }}/plugins/bootstrap/js/bootstrap.js"></script>

   <!-- Select Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="{{ asset('Assets') }}/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/node-waves/waves.js"></script>
    
    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    
    <!-- Multi Select Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- noUISlider Plugin Js -->
     @if(Request::segment(2) == 'transportation')
    <script src="{{ asset('Assets') }}/plugins/nouislider/nouislider.js"></script>
     @else

     @endif

    @if(empty(Request::segment(1)))
    <!-- Morris Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="{{ asset('Assets') }}/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    
  
    
    <script src="{{ asset('Assets') }}/plugins/flot-charts/jquery.flot.js"></script>
    <script src="{{ asset('Assets') }}/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="{{ asset('Assets') }}/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="{{ asset('Assets') }}/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="{{ asset('Assets') }}/plugins/flot-charts/jquery.flot.time.js"></script>
    <!-- <script src="{{ asset('Assets') }}/js/pages/index.js"></script> -->
    @else
              
    @endif
  
    
    <!-- Autosize Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ asset('Assets') }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('Assets') }}/js/admin.js"></script>
    <!-- <script src="{{ asset('Assets') }}/js/pages/forms/form-wizard.js"></script> -->
    
    <!-- <script src="{{ asset('Assets') }}/js/pages/tables/jquery-datatable.js"></script> -->

    <!-- Demo Js -->
    <script src="{{ asset('Assets') }}/js/demo.js"></script>
    <script src="{{ asset('Assets') }}/jquery.number.js"></script>
    <script src="{{ asset('Assets') }}/terbilang.js"></script>
</body>

</html>

