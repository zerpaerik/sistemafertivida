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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">

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
            <h1 class="m-0 text-dark">Consultas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear</li>
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
                <h3 class="card-title">Agregar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="consultas/create" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}                
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-3">
                      <label>Servicio</label>
                        <select class="form-control" name="servicio">
                         @foreach($servicios as $s)
						             <option value="{{$s->id}}">{{$s->nombre}}</option>
                         @endforeach
                        </select>
                   </div> 

                   <div class="col-md-3">
                      <label>Especialista</label>
                        <select class="form-control" name="especialista">
                         @foreach($prof as $p)
						             <option value="{{$p->id}}">{{$p->lastname}} {{$p->name}}</option>
                         @endforeach
                        </select>
                   </div> 
                   <div class="col-md-3">
                      <label>Cómo se entero de nosotros?</label>
                        <select class="form-control" name="entero">
						             <option value="Facebook">Facebook</option>
                         <option value="Tik Tok">Tik Tok</option>
						             <option value="Instagram">Instagram</option>
						             <option value="Youtube">Youtube</option>
						             <option value="Por Familiar">Por Familiar</option>
						             <option value="Por Amigo">Por Amigo</option>

                        </select>
                   </div> 
                   <div class="col-md-3">
                      <label>Lugar de procedencia</label>
                        <select class="form-control" name="provincia">
                         <option value="AMAZONAS">AMAZONAS</option>
                         <option value="ANCASH">ANCASH</option>
						             <option value="APURIMAC">APURIMAC</option>
						             <option value="AREQUIPA">AREQUIPA</option>
						             <option value="AYACUCHO">AYACUCHO</option>
						             <option value="CAJAMARCA">CAJAMARCA</option>
                         <option value="CALLAO">CALLAO</option>
						             <option value="CUSCO">CUSCO</option>
						             <option value="HUANCAVELICA">HUANCAVELICA</option>
						             <option value="HUANUCO">HUANUCO</option>
						             <option value="ICA">ICA</option>
						             <option value="JUNIN">JUNIN</option>
						             <option value="LA LIBERTAD">LA LIBERTAD</option>
						             <option value="LAMBAYEQUE">LAMBAYEQUE</option>
                         <option value="LIMA">LIMA</option>
						             <option value="LORETO">LORETO</option>
						             <option value="MADRE DE DIOS">MADRE DE DIOS</option>
						             <option value="MOSQUEGUA">MOSQUEGUA</option>
						             <option value="PASCO">PASCO</option>
						             <option value="PIURA">PIURA</option>
						             <option value="PUNA">PUNA</option>
						             <option value="SAN MARTIN">SAN MARTIN</option>
						             <option value="TACNA">TACNA</option>
						             <option value="TUMBES">TUMBES</option>
						             <option value="UCAYALI">UCAYALI</option>
                        </select>
                   </div> 
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                      <label>Paciente Mujer</label>
                        <select class="form-control js-example-basic-single" name="pacientem">
                         @foreach($pacientesm as $pm)
						             <option value="{{$pm->id}}">{{$pm->dni}} - {{$pm->apellidos}},{{$pm->apellidos1}} {{$pm->nombres}}</option>
                         @endforeach
                        </select>
                   </div> 

                   <div class="col-md-6">
                      <label>Paciente Hombre</label>
                        <select class="form-control js-example-basic-single1" name="pacienteh">
                        <option value="999999">Ninguno</option>
                         @foreach($pacientesh as $ph)
						             <option value="{{$ph->id}}">{{$ph->dni}} - {{$ph->apellidos}},{{$ph->apellidos1}} {{$ph->nombres}}</option>
                         @endforeach
                        </select>
                   </div> 
                  </div>



            

                  <br>

               
                

        
                 
                </div>
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

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  $(document).ready(function() {
    $('.js-example-basic-single1').select2();
  });


</script>
<!-- page script -->

</body>
</html>