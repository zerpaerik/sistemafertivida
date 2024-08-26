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
              <li class="breadcrumb-item active">Crear Admisión</li>
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
                <h3 class="card-title">Servicio: {{$consulta->servicio}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="consultas/admision" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}                
                    <div class="card-body">
                    <br>
                   

                   <div class="row">
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">FICHA DE IDENTIFICACIÓN - MUJER</label>

                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">FICHA DE IDENTIFICACIÓN - HOMBRE</label>
                        </div>
                   </div>

                   <div class="row">

                    <div class="col-md-6">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                <h3 class="card-title">Datos personales Mujer</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="row" style="margin-left:5px;margin-right:5px;">
                                        
                                            <div class="col-md-6">
                                            <label for="exampleInputEmail1">Nombres</label>
                                                <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->nombres}}" placeholder="Persona Contacto" disabled>
                                            </div>
                                            
                                            <div class="col-md-6">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                                <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->apellidos}} {{$consulta->apellidos1}}" placeholder="Persona Contacto" disabled>
                                            </div>
                                    </div>

                                    <div class="row" style="margin-left:5px;margin-right:5px;">
                                        
                                        <div class="col-md-6">
                                        <label for="exampleInputEmail1">Documento</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->dni}}" placeholder="Persona Contacto" disabled>
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label for="exampleInputEmail1">Edad</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$edad}}" placeholder="Persona Contacto" disabled>
                                        </div>
                                    </div>

                                    
                                    <div class="row" style="margin-left:5px;margin-right:5px;">
                                        
                                        <div class="col-md-6">
                                        <label for="exampleInputEmail1">Telèfono</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->telefono}}" placeholder="Persona Contacto" disabled>
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <label for="exampleInputEmail1">Ocupación</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->ocupacion}}" placeholder="Persona Contacto" disabled>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left:5px;margin-right:5px;">
                                        
                                        <div class="col-md-12">
                                        <label for="exampleInputEmail1">Dirección</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->direccion}}" placeholder="Persona Contacto" disabled>
                                        </div>
                                        
                                        
                                    </div>
                                
                                <!-- /.users-list -->
                                </div>
                            
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!--/.card -->
                            </div>
                            

                            <div class="col-md-6">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                <h3 class="card-title">Datos personales Hombre</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                
                                </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                <div class="row" style="margin-left:5px;margin-right:5px;">
                                
                                    <div class="col-md-6">
                                    <label for="exampleInputEmail1">Nombres</label>
                                        <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->nombresh}}" placeholder="Persona Contacto" disabled>
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <label for="exampleInputEmail1">Apellidos</label>
                                        <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->apellidosh}} {{$consulta->apellidosh1}}" placeholder="Persona Contacto" disabled>
                                    </div>
                                </div>

                                <div class="row" style="margin-left:5px;margin-right:5px;">
                                
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Documento</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->dnih}}" placeholder="Persona Contacto" disabled>
                                </div>
                                
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Edad</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$edad1}}" placeholder="Persona Contacto" disabled>
                                </div>
                            </div>

                            
                            <div class="row" style="margin-left:5px;margin-right:5px;">
                                
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Telèfono</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->telefonoh}}" placeholder="Persona Contacto" disabled>
                                </div>
                                
                                <div class="col-md-6">
                                <label for="exampleInputEmail1">Ocupación</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->ocupacionh}}" placeholder="Persona Contacto" disabled>
                                </div>
                            </div>
                            <div class="row" style="margin-left:5px;margin-right:5px;">
                                
                                <div class="col-md-12">
                                <label for="exampleInputEmail1">Dirección</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->direccionh}}" placeholder="Persona Contacto" disabled>
                                </div>
                                
                                
                            </div>
                                
                                <!-- /.users-list -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!--/.card -->
                            </div>
                            <!-- /.col -->
                        </div>

                                    
                   <br>
                   <div class="row">

<div class="col-md-6">
        <!-- USERS LIST -->
        <div class="card">
            <div class="card-header" style="background-color:pink;">
            <h3 class="card-title" style="color: white;">Ficha técnica mujer</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-2">
                        <label for="exampleInputEmail1">Peso</label>
                            <input type="text" class="form-control" id="peso" name="peso"  placeholder="" value="{{$admision->peso}}" disabled>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">Talla</label>
                            <input type="text" class="form-control" id="talla" name="talla"   placeholder="" value="{{$admision->talla}}" disabled>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">IMC</label>
                            <input type="text" class="form-control" id="nombre" name="imc" value="{{$admision->imc}}" disabled >
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">PA</label>
                            <input type="text" class="form-control" id="nombre" name="pa" value="{{$admision->pa}}" disabled>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">T</label>
                            <input type="text" class="form-control" id="nombre" name="t" value="{{$admision->t}}" disabled>
                        </div>
                       
                        
                </div>

                <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-6">
                        <label for="exampleInputEmail1">G</label>
                            <input type="text" class="form-control" id="nombre" name="g" value="{{$admision->g}}" disabled>
                        </div>
                    
                          <div class="col-md-6">
                        <label for="exampleInputEmail1">G1</label>
                            <input type="text" class="form-control" id="g1" name="g1"  placeholder="" value="{{$admision->g1}}" disabled>
                        </div>
                      
                    
                </div>

                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
                       
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">G2</label>
                            <input type="text" class="form-control" id="g2" name="g2"   placeholder="" value="{{$admision->g2}}" disabled>
                        </div>

                        <div class="col-md-6">
                        <label for="exampleInputEmail1">G3</label>
                            <input type="text" class="form-control" id="nombre" name="g3" value="{{$admision->g3}}" disabled>
                        </div>

                    
                </div>

                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
                       

                        <div class="col-md-6">
                        <label for="exampleInputEmail1">G4</label>
                            <input type="text" class="form-control" id="nombre" name="g4" value="{{$admision->g4}}" disabled>
                        </div>

                        <div class="col-md-6">
                        <label for="exampleInputEmail1">G5</label>
                            <input type="text" class="form-control" id="nombre" name="g5" value="{{$admision->g5}}" disabled>
                        </div>
                    
                </div>

                <br>


                
                <div class="row" style="margin-left:5px;margin-right:5px;">
                       <div class="col-md-4">
                        <label for="exampleInputEmail1">FUR</label>
                            <input type="date" class="form-control" id="g1" name="fur"  placeholder="" value="{{$admision->fur}}" disabled >
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">RC</label>
                            <input type="text" class="form-control" id="g2" name="rc"   placeholder="" value="{{$admision->rc}}" disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Menarquia</label>
                            <input type="text" class="form-control" id="menarquia" name="menarquia" value="{{$admision->menarquia}}" disabled>
                        </div>
                   
                    
                   
                </div>
                <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Dismenorrea</label>
                            <input type="text" class="form-control" id="dismenorrea" name="dismeno" value="{{$admision->disme}}" disabled>
                        </div>
                    
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Frec.Sexual</label>
                            <input type="text" class="form-control" id="sexo" name="sexo" value="{{$admision->fsex}}" disabled>
                        </div>
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Fuma</label>
                            <input type="text" class="form-control" id="g1" name="fumam"  placeholder="" value="{{$admision->fum}}" disabled>
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Alcohol</label>
                            <input type="text" class="form-control" id="g2" name="alcoholm"   placeholder="" value="{{$admision->alc}}" disabled>
                        </div>
                      
                    
                </div>
                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
               
                        <div class="col-md-12">
                        <label for="exampleInputEmail1">Cirugias previas</label>
                            <input type="text" class="form-control" id="menarquia" name="cirm" value="{{$admision->cir}}" disabled>
                        </div>
                    
                </div>
                <br>





                <div class="row" style="margin-left:5px;margin-right:5px;">

                <div class="col-md-6">
                        <label for="exampleInputEmail1">Enfermedades previas</label>
                            <input type="text" class="form-control" id="g1" name="enfm"  placeholder="" value="{{$admision->enf}}" disabled>
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Uso de medicamentos</label>
                            <input type="text" class="form-control" id="g2" name="medm"   placeholder="" value="{{$admision->med}}" disabled>
                        </div>
                   

                </div>
                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">

               
                        <div class="col-md-8">
                        <label for="exampleInputEmail1">Alergias</label>
                            <input type="text" class="form-control" id="alergm" name="alergm" value="{{$admision->alerg}}" disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Núm.Par.Sex</label>
                            <input type="text" class="form-control" id="g1" name="parejas"  placeholder="" value="{{$admision->parejas}}" disabled>
                        </div>

                </div>
                <br>


                <div class="row" style="margin-left:5px;margin-right:5px;">

                
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Anticonceptivos</label>
                            <input type="text" class="form-control" id="g2" name="anticonceptivos"   placeholder="" value="{{$admision->anti}}" disabled >
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Tratamientos previos de fertilidad</label>
                            <input type="text" class="form-control" id="alergm" name="ferti" value="{{$admision->trat}}" disabled>
                        </div>

                  

                </div>
            
            <!-- /.users-list -->
            </div>
        
            <!-- /.card-body -->
            <div class="card-footer text-center">
            </div>
            <!-- /.card-footer -->
        </div>
        <!--/.card -->
        </div>
        

        <div class="col-md-6">
        <!-- USERS LIST -->
        <div class="card">
        <div class="card-header" style="background-color:blue;">
        <h3 class="card-title" style="color: white;">Ficha técnica hombre</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <br>

            <div class="row" style="margin-left:5px;margin-right:5px;">
            <div class="col-md-3">
                        <label for="exampleInputEmail1">Peso</label>
                            <input type="text" class="form-control" id="nombre" name="pesoh" value="{{$admision->pesoh}}" disabled>
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Talla</label>
                            <input type="text" class="form-control" id="nombre" name="tallah" value="{{$admision->tallah}}" disabled>
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">IMC</label>
                            <input type="text" class="form-control" id="nombre" name="imch" value="{{$admision->imch}}" disabled>
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Hijos</label>
                            <input type="text" class="form-control" id="nombre" name="hijos" value="{{$admision->hijos}}" disabled>
                        </div>
                     
                
            </div>
            <br>

            <div class="row" style="margin-left:5px;margin-right:5px;">
            
                     <div class="col-md-6">
                        <label for="exampleInputEmail1">Cirugias previas</label>
                            <input type="text" class="form-control" id="nombre" name="cirugias" value="{{$admision->cir}}" disabled>
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Enfermedades previas</label>
                            <input type="text" class="form-control" id="nombre" name="enf" value="{{$admision->enf}}" disabled>
                        </div>
                     
        </div>
        <br>

        <div class="row" style="margin-left:5px;margin-right:5px;">
            
            <div class="col-md-6">
               <label for="exampleInputEmail1">Uso de medicamentos</label>
                   <input type="text" class="form-control" id="nombre" name="medh" value="{{$admision->medh}}" disabled>
               </div>
               <div class="col-md-6">
               <label for="exampleInputEmail1">Alergias</label>
                   <input type="text" class="form-control" id="nombre" name="alergh" value="{{$admision->alerg}}" disabled>
               </div>
            
</div>
<br>

                
                <div class="row" style="margin-left:5px;margin-right:5px;">
                 
                   
            
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Fuma</label>
                            <input type="text" class="form-control" id="fuma" name="fuma" value="{{$admision->fumh}}" disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Drogas</label>
                            <input type="text" class="form-control" id="drogas" name="drogas" value="{{$admision->drogh}}" disabled>
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Alcohol</label>
                            <input type="text" class="form-control" id="alcohol" name="alcohol" value="{{$admision->alch}}" disabled>
                        </div>
                </div>
                <br>
    
    
            
            <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
            </div>
            <!-- /.card-footer -->
        </div>
        <!--/.card -->
        </div>
        <!-- /.col -->
    </div>

                
<br>

                 

                <input type="hidden" name="consulta" value="{{$consulta->id}}">



                

                  <br>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->

</body>
</html>