<?php
  $ruta = 'http://localhost:8080/SistemaAmilat/';
 // $ruta = 'http://sistema.shalom.org/SistemaAmilat/';
  //$ruta = 'http://localhost/SistemaAmilat/';
  
?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SistemaAmilat | Centro Medico Familiar Shalom</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>lib\Font-Awesome-master\css\font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/fullcalendar/fullcalendar.print.css" media="print"> 

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>lib\ionicons-master\css\ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/datepicker/datepicker3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/select2/select2.min.css">

    <link rel="stylesheet" href="<?php echo $ruta; ?>web/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="<?php echo $ruta; ?>web/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/dist/css/skins/_all-skins.min.css">
<!-- 
    <link rel="stylesheet" href="<?php echo $ruta; ?>web/dist/parsley.css"> -->

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>

    <script src="<?php echo $ruta; ?>web/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo $ruta; ?>web/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo $ruta; ?>web/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $ruta; ?>web/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $ruta; ?>web/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $ruta; ?>web/dist/js/demo.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo $ruta; ?>web/plugins/input-mask/jquery.inputmask.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo $ruta; ?>web/lib/moments.js2.14.1/moment.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo $ruta; ?>web/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo $ruta; ?>web/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo $ruta; ?>web/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo $ruta; ?>web/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo $ruta; ?>web/plugins/iCheck/icheck.min.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo $ruta; ?>web/plugins/fullcalendar/fullcalendar.min.js"></script>

   <!--  <script src="<?php echo $ruta; ?>web/dist/parsley.min.js"></script>
    
    <script src="<?php echo $ruta; ?>web/dist/i18n/es.js"></script>
 -->
</head>

<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true,
    });
      });
    </script>
