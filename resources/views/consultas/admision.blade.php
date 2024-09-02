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
                                        <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->email}}" placeholder="Email" disabled>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row" style="margin-left:5px;margin-right:5px;">
                                        
                                        <div class="col-md-12">
                                        <label for="exampleInputEmail1">Dirección</label>
                                            <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->direccion}}" placeholder="Email" disabled>
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
                                <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="nombre" name="responsable" value="{{$consulta->emailh}}" placeholder="Email" disabled>
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
               <label for="exampleInputEmail1" style="margin-left:12px;">Antecedentes Obstétricos</label>
               <br>               <br>


                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-1">
                        <label for="exampleInputEmail1">Peso</label>
                            <input type="text" class="form-control" id="peso" name="peso"  placeholder="" required>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">Talla</label>
                            <input type="text" class="form-control" id="talla" name="talla"   placeholder="" require>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">IMC</label>
                            <input type="text" class="form-control" id="nombre" name="imc" require>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">PA</label>
                            <input type="text" class="form-control" id="nombre" name="pa" require>
                        </div>
                        <div class="col-md-2">
                        <label for="exampleInputEmail1">T</label>
                            <input type="text" class="form-control" id="nombre" name="t" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">PAP</label>
                            <input type="date" class="form-control" id="nombre" name="pap" >
                        </div>
                       
                        
                </div>

                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Gestas</label>
                            <input type="text" class="form-control" id="nombre" name="g" >
                        </div>
                    
                          <div class="col-md-3">
                        <label for="exampleInputEmail1">Abortos</label>
                            <input type="text" class="form-control" id="g1" name="g1"  placeholder="" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Vaginales</label>
                            <input type="text" class="form-control" id="nombre" name="g2" >
                        </div>
                    
                          <div class="col-md-3">
                        <label for="exampleInputEmail1">Nac Vivos</label>
                            <input type="text" class="form-control" id="g1" name="g3"  placeholder="" >
                        </div>
                      
                    
                </div>

                <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Viven</label>
                            <input type="text" class="form-control" id="g2" name="g4"   placeholder="" >
                        </div>

                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Partos</label>
                            <input type="text" class="form-control" id="nombre" name="g5" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Cesarea</label>
                            <input type="text" class="form-control" id="nombre" name="g6" >
                        </div>

                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Nac Muertos</label>
                            <input type="text" class="form-control" id="nombre" name="g7" >
                        </div>
                    

              
                      
                    
                </div>

                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                       <label for="exampleInputEmail1">Desp.1SEM</label>
                           <input type="text" class="form-control" id="nombre" name="g8" >
                       </div>
                       
                     
                    
                </div>

                <br>
               

               <div class="row" style="margin-left:5px;margin-right:5px;">
               <div class="col-md-12">
                    <label for="exampleInputEmail1">Observaciones</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="obserg" placeholder="Observaciones"></textarea>
                   </div>
                    </div>
                    <br>


                
                <div class="row" style="margin-left:5px;margin-right:5px;">
                       <div class="col-md-3">
                        <label for="exampleInputEmail1">FUR</label>
                            <input type="date" class="form-control" id="g1" name="fur"  placeholder="" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">RC</label>
                            <input type="text" class="form-control" id="g2" name="rc"   placeholder="" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Menarquia</label>
                            <input type="text" class="form-control" id="menarquia" name="menarquia" >
                        </div>

                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Drogas</label>
                            <input type="text" class="form-control" id="menarquia" name="drogm" >
                        </div>
                   
                   
                    
                   
                </div>
                <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Dismenorrea</label>
                            <input type="text" class="form-control" id="dismenorrea" name="dismeno" >
                        </div>
                    
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Frec.Sexual</label>
                            <input type="text" class="form-control" id="sexo" name="sexo" >
                        </div>
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Fuma</label>
                            <input type="text" class="form-control" id="g1" name="fumam"  placeholder="" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Alcohol</label>
                            <input type="text" class="form-control" id="g2" name="alcoholm"   placeholder="" >
                        </div>
                      
                    
                </div>
                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Disporemia</label>
                            <input type="text" class="form-control" id="dismenorrea" name="dispa" >
                        </div>
                    
                <div class="col-md-3">
                        <label for="exampleInputEmail1">Papanicolao</label>
                            <input type="text" class="form-control" id="sexo" name="papanico" >
                        </div>
              
                      
                    
                </div>
                <br>
                <label for="exampleInputEmail1" style="margin-left:12px;">Antecedentes Quirurgicos</label>
                <br>               <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">
               <div class="col-md-12">
                    <label for="exampleInputEmail1">Cirugias previas</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="cirm" placeholder="Cirugias previas"></textarea>
                   </div>
                    </div>
                    <br>

            

                <label for="exampleInputEmail1" style="margin-left:12px;">Antecedentes Patológicos</label>
                <br>               <br>

                <div class="row" style="margin-left:5px;margin-right:5px;">
               <div class="col-md-12">
                    <label for="exampleInputEmail1">Enfermedades previas</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="enfm" placeholder="Enfermedades previas"></textarea>
                   </div>
                    </div>
                    <br>

                    <div class="row" style="margin-left:5px;margin-right:5px;">
               <div class="col-md-12">
                    <label for="exampleInputEmail1">Uso de medicamentos</label>
                    <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="3"  name="medm" placeholder="Uso de medicamentos"></textarea>
                   </div>
                    </div>
                    <br>




               
                <br>
                <div class="row" style="margin-left:5px;margin-right:5px;">

               
                        <div class="col-md-8">
                        <label for="exampleInputEmail1">Alergias</label>
                            <input type="text" class="form-control" id="alergm" name="alergm" >
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Parejas Sexuales</label>
                            <input type="text" class="form-control" id="g1" name="parejas"  placeholder="" >
                        </div>

                </div>
                <br>


                <div class="row" style="margin-left:5px;margin-right:5px;">

                
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Anticonceptivos</label>
                            <input type="text" class="form-control" id="g2" name="anticonceptivos"   placeholder="" >
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Tratamientos previos de fertilidad</label>
                            <input type="text" class="form-control" id="alergm" name="ferti" >
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
                            <input type="text" class="form-control" id="nombre" name="pesoh" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Talla</label>
                            <input type="text" class="form-control" id="nombre" name="tallah" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">IMC</label>
                            <input type="text" class="form-control" id="nombre" name="imch" >
                        </div>
                        <div class="col-md-3">
                        <label for="exampleInputEmail1">Hijos</label>
                            <input type="text" class="form-control" id="nombre" name="hijos" >
                        </div>
                     
                
            </div>
            <br>

            <div class="row" style="margin-left:5px;margin-right:5px;">
            
                     <div class="col-md-6">
                        <label for="exampleInputEmail1">Cirugias previas</label>
                            <input type="text" class="form-control" id="nombre" name="cirugias" >
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputEmail1">Enfermedades previas</label>
                            <input type="text" class="form-control" id="nombre" name="enf" >
                        </div>
                     
        </div>
        <br>

        <div class="row" style="margin-left:5px;margin-right:5px;">
            
            <div class="col-md-6">
               <label for="exampleInputEmail1">Uso de medicamentos</label>
                   <input type="text" class="form-control" id="nombre" name="medh" >
               </div>
               <div class="col-md-6">
               <label for="exampleInputEmail1">Alergias</label>
                   <input type="text" class="form-control" id="nombre" name="alergh" >
               </div>
            
</div>
<br>

                
                <div class="row" style="margin-left:5px;margin-right:5px;">
                 
                   
            
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Fuma</label>
                            <input type="text" class="form-control" id="fuma" name="fuma" >
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Drogas</label>
                            <input type="text" class="form-control" id="drogas" name="drogas" >
                        </div>
                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Alcohol</label>
                            <input type="text" class="form-control" id="alcohol" name="alcohol" >
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->

</body>
</html>