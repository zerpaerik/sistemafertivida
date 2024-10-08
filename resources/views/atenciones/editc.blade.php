<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fertivida | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  @include('layouts.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Atenciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Movimientos</a></li>
              <li class="breadcrumb-item active">Atenciones</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="atenciones/editc">					
              {{ csrf_field() }}                
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                    <label for="exampleInputEmail1">Tipo de Consulta</label>
                            <select class="form-control" name="tipo" id="el2">
                                    @if($atencion->id_tipo == 1)
                                    <option value="1" selected>CONSULTA</option>
                                    <option value="2" >CONTROL</option>
                                    @else
                                    <option value="1" >CONSULTA</option>
                                    <option value="2" selected>CONTROL</option>
                                    @endif
                            </select>
                    </div>

                    <div class="col-md-4">
                    
                   
                    <label for="exampleInputEmail1">Especialista</label>
                            <select class="form-control" name="especialista">
                            @foreach($personal as $u)
                                @if($consulta->id_especialista == $u->id)
                                <option value="{{$u->id}}" selected="selected">{{$u->lastname}} {{$u->name}}-{{$u->dni}}</option>
                                @else
                                <option value="{{$u->id}}">{{$u->lastname}} {{$u->name}}-{{$u->dni}}</option>
                                @endif
                            @endforeach
                                
                            </select>
                    </div>

                
                  </div>
                  <br>

                  <div class="row">
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Monto</label>
                    <input type="text" class="form-control" id="name" name="monto" value="{{$atencion->monto}}" placeholder="Nombre de Analisis">
                  </div>
                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Abono</label>
                    <input type="text" class="form-control" id="email" name="abono1" value="{{$atencion->abono1}}" placeholder="Descripción">
                  </div>
                  <div class="col-md-2">
                  <label for="exampleInputEmail1">Tipo de Pago</label>
                  <select class="form-control" name="tipo_pago">

                            @if($atencion->tipo_pago == 'EF')
                                <option selected value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP">Yape</option>
                            @elseif($atencion->tipo_pago == 'TJ')
                                <option value="EF">Efectivo</option>
                                <option value="TJ" selected>Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP">Yape</option>
                            @elseif($atencion->tipo_pago == 'DP')
                                <option value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP" selected>Depósito</option>
                                <option value="YP">Yape</option>
                            @else
                                <option  value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP" selected>Yape</option>
                            @endif
                                
                            </select>
                    
                  </div>

                  <div class="col-md-2">
                    <label for="exampleInputEmail1">Abono</label>
                    <input type="text" class="form-control" id="email" name="abono2" value="{{$atencion->abono2}}" placeholder="Descripción">
                  </div>
                  <div class="col-md-2">
                  <label for="exampleInputEmail1">Tipo de Pago</label>
                  <select class="form-control" name="tipo_pago1">

                            @if($atencion->tipo_pago1 == 'EF')
                                <option selected value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP">Yape</option>
                            @elseif($atencion->tipo_pago1 == 'TJ')
                                <option value="EF">Efectivo</option>
                                <option value="TJ" selected>Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP">Yape</option>
                            @elseif($atencion->tipo_pago1 == 'DP')
                                <option value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP" selected>Depósito</option>
                                <option value="YP">Yape</option>
                            @else
                                <option  value="EF">Efectivo</option>
                                <option value="TJ">Tarjeta</option>
                                <option value="DP">Depósito</option>
                                <option value="YP" selected>Yape</option>
                            @endif
                                
                            </select>
                    
                  </div>



                  </div>

               
                  <br>
                

                  <input type="hidden" name="id" value="{{$atencion->id}}">

                  
            

               
        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         
            <!-- /.card -->

           
           
               


           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    

  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type="text/javascript">
      $(document).ready(function(){
        $('#el2').on('change',function(){
          var link;
          if ($(this).val() == 1) {
            link = '/atenciones/personal/';

          }else if ($(this).val() == 2) {
            link = '/atenciones/profesionales/';
          } else {
		    link = '/atenciones/particular/';
		  }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#origen_usuario').html(a);
                 }
          });

        });
        

      });
       
    </script>


<script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

</body>
</html>