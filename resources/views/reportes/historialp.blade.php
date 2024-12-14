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
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">


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
            <h1 class="m-0 text-dark">Historial de Pacientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historial de Pacientes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    @include('flash-message')
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
             

                  <form method="get" action="historial_pacientes">					
                  <label for="exampleInputEmail1">Seleccione el Paciente</label>

                    <div class="row">
                  <div class="col-md-5">
                  <select class="form-control js-example-basic-single" name="id_paciente">
                    @foreach($pacientes as $role)
                      <option value="{{$role->id}}">{{$role->apellidos}},{{$role->nombres}}-{{$role->dni}}</option>
                    @endforeach
                  </select>
                   
                  </div>

                  <div class="col-md-2" style="margin-top: 1px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </form>
              
              </div>
              <br>
              <!-- /.card-header -->
               <p>CONSULTAS</p>
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente Mujer</th>
                    <th>Paciente Hombre</th>
                    <th>Especialista</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($consultas as $an)
                  <tr>
                    <td>{{$an->id}}</td>
                    <td>{{date('d-M-y H:i', strtotime($an->created_at))}}</td>
                    <td>{{$an->apellidos}} {{$an->apellidos1}}, {{$an->nombres}} </td>
                    <td>{{$an->apellidosh}} {{$an->apellidos1h}}, {{$an->nombresh}}</td>
                    <td>{{$an->name}} {{$an->lastname}}</td>
                    <td><span class="badge bg-info">{{$an->servicio}}</span></td>

                    <td>

                      @if($an->tipo == 999)

                        @if($an->estatus == 0)
                          @if($an->id_paciente_hombre == 999999)
                          <a class="btn btn-info btn-sm" href="consultas-admisionm-{{$an->id}}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Admisión
                            </a>
                            @else
                            <a class="btn btn-info btn-sm" href="consultas-admision-{{$an->id}}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Admisión
                            </a>
                          @endif
                          @endif

                    


                      <a class="btn btn-danger btn-sm" href="consultas-delete-{{$an->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                      </a>

                      @if($an->estatus != 2)

                      <a class="btn btn-primary btn-sm" href="consultas-evolucion-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Cargar Evolución
                        </a>

                        @else
                        <a class="btn btn-primary btn-sm" href="consultas-ver-{{$an->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                        </a>

                        @endif



                      @else
                   
                    
                         @if($an->estatus == 0)
                          @if($an->id_paciente_hombre == 999999)
                          <a class="btn btn-info btn-sm" href="consultas-admisionm-{{$an->id}}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Admisión
                            </a>
                            @else
                            <a class="btn btn-info btn-sm" href="consultas-admision-{{$an->id}}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Admisión
                            </a>
                          @endif

                         @elseif($an->estatus == 2)
                        <span class="badge bg-success">YA FUE ATENDIDO</span>
                        <a class="btn btn-danger btn-sm" href="consultas-urologia-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Urologia
                        </a>
                        <a class="btn btn-primary btn-sm" href="consultas-ver-{{$an->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                        </a>

                        @elseif($an->estatus == 3)
                        <span class="badge bg-success">CONSULTA ATENDIDA COMPLETA</span>
                        <a class="btn btn-primary btn-sm" href="consultas-ver-{{$an->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                        </a>

                        @else
                        <span class="badge bg-success">ADMISIÓN REGISTRADA</span>
                        @if($an->id_paciente_hombre == 999999)
                        
                        <a class="btn btn-danger btn-sm" href="consultas-atencionm-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Atender
                        </a>
                        @else
                        
                        <a class="btn btn-danger btn-sm" href="consultas-atencion-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Atender
                        </a>
                        @endif

                        @endif
                        <a class="btn btn-danger btn-sm" href="consultas-delete-{{$an->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>

                        @endif

                

                    </td>
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente Mujer</th>
                    <th>Paciente Hombre</th>
                    <th>Especialista</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              
              <!-- /.card-body -->
              <p style="margin-left:20px;">RECETAS</p>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($recetas as $p)
                  <tr>
                    <td>{{$p->nombres}}</td>
                    <td>{{$p->apellidos}} {{$p->apellidos1}}</td>
                    <td>{{$p->created_at}}</td>
                 

                    <td><a class="btn btn-primary btn-sm" target="_blank" href="recetas-ver-{{$p->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                          </a>
                       
                          @if(Auth::user()->rol == 1)

                          <a class="btn btn-primary btn-sm" href="recetas-edit-{{$p->id}}">
                              <i class="fas fa-edit">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="recetas-delete-{{$p->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                          @endif
                          </td>
                  </tr>
                  @endforeach
                 
                 
               
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <p style="margin-left:20px;">ORDENES</p>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($ordenes as $p)
                  <tr>
                    <td>{{$p->nombres}}</td>
                    <td>{{$p->apellidos}} {{$p->apellidos1}}</td>
                    <td>{{$p->created_at}}</td>
                 
                    <td><a class="btn btn-primary btn-sm" target="_blank" href="ordenes-ver-{{$p->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                          </a>
                       
                          @if(Auth::user()->rol == 1)
                          <a class="btn btn-primary btn-sm" href="ordenes-edit-{{$p->id}}">
                              <i class="fas fa-edit">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="ordenes-delete-{{$p->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                          @endif
                          </td>
                  </tr>
                  @endforeach
                 
                 
               
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <p style="margin-left:20px;">PRUEBA DE CATETER</p>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($evaluaciones as $p)
                  <tr>
                    <td>{{$p->nombres}}</td>
                    <td>{{$p->apellidos}} {{$p->apellidos1}}</td>
                    <td>{{$p->created_at}}</td>
                 
                    <td><a class="btn btn-primary btn-sm"  href="evaluaciones-ver-{{$p->id}}">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                          </a>
                       
                          @if(Auth::user()->rol == 1)
                          <a class="btn btn-danger btn-sm" href="evaluaciones-delete-{{$p->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                          @endif
                          </td>
                  </tr>
                  @endforeach
                 
                 
               
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

              <p style="margin-left:20px;">EVALUACIONES</p>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>RP</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($eva as $an)
                  <tr>
                    <td>{{$an->created_at}}</td>
                    <td>{{$an->apellidos}} {{$an->nombres}}</td>
                    <td>{{$an->lastname}} {{$an->name}}</td>
                    <td>
                    <a class="btn btn-primary btn-sm" id="{{$an->id}}" onclick="viewh(this)">
                              <i class="fas fa-eye">
                              </i>
                              Ver
                          </a>
                    @if(Auth::user()->rol == 1)
                          <a class="btn btn-danger btn-sm" href="eva-delete-{{$an->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                          @endif</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>RP</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>



              <p style="margin-left:20px;">PROFORMAS</p>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($proformas as $p)
                  <tr>
                    <td>{{$p->nombres}}</td>
                    <td>{{$p->apellidos}} {{$p->apellidos1}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->modelo}}</td>
                    @if($p->estatus == 1)
                    <td><span class="badge bg-info">SIN PROFORMA</span></td>
                    @else
                    <td><span class="badge bg-info">PROFORMA CARGADA</span></td>
                    @endif
                 
                    <td>

                        @if($p->estatus ==1)

                         <a class="btn btn-primary btn-sm" href="/modelo-proforma-{{$p->id}}-{{$p->modelo}}" target="_blank">
                              <i class="fas fa-download">
                              </i>
                              Descargar Modelo
                         </a>

                         <a class="btn btn-secondary btn-sm" href="proformas-upload-{{$p->id}}">
                              <i class="fas fa-upload">
                              </i>
                              Subir Archivo
                          </a>
                          @else
                          <a class="btn btn-primary btn-sm" href="{{route('descargar2',$p->proforma)}}">
                              <i class="fas fa-download">
                              </i>
                              Descargar Archivo
                          </a>
                          @endif
                       
                          @if(Auth::user()->rol == 1)
                         
                          <a class="btn btn-danger btn-sm" href="proformas-delete-{{$p->id}}" onclick="return confirm('¿Desea Eliminar este registro?')">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                          @endif
                          </td>
                  </tr>
                  @endforeach
                 
                 
               
                 
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>


              <p style="margin-left:20px;">RESULTADOS DE SERVICIO</p>


              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($resultados as $an)
                  <tr>
                    <td>{{$an->created_at}}</td>
                    <td>{{$an->apellidos}} {{$an->nombres}}</td>
                    <td>{{$an->servicio}}</td>
                    <td>
                    <a href="resultados-imagenes-{{$an->id}}" class="btn btn-warning">Ver Imagenes</a>

                    @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)

                    <a href="resultadosg-reversar-{{$an->id}}" class="btn btn-success">Reversar</a>
                    @endif

                    <a href="{{route('descargar2',$an->informe_guarda)}}" class="btn btn-success" target="_blank">Ver Informe</a>



                    </td>

                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
                  </tr>
                 
                  </tfoot>

                </table>
              </div>

              <p style="margin-left:20px;">RESULTADOS DE LABORATORIO</p>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($resultadosl as $resl)
                  <tr>
                   <td>{{$resl->created_at}}</td>
                    <td>{{$resl->apellidos}} {{$resl->nombres}}</td>
                    <td>{{$resl->laboratorio}}</td>
                    <td>
                    @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
                    <a href="resultadosgl-reversar-{{$resl->id}}" class="btn btn-success">Reversar</a>
                    @endif

                    <a href="{{route('descargar2',$resl->informe_guarda)}}" class="btn btn-success" target="_blank">Ver Informe</a>

                    
              

                    </td>

                   

                    </td>


                    <td>
                    @if(Auth::user()->rol == 1)
                   

                         

                        
                         </td>
                          @endif
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Pac.</th>
                    <th>Det.</th>
                    <th>Informe.</th>
                    <th>Acciones</th>
                  </tr>
                 
                  </tfoot>

                </table>
              </div>













            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

  <div class="modal fade" id="viewTicket">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script>

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>


<!-- page script -->

<script type="text/javascript">
		function viewh(e){
		    var id = $(e).attr('id');
		    
		    $.ajax({
		        type: "GET",
		        url: "/eva/ver/"+id,
		        success: function (data) {
		            $("#viewTicket .modal-body").html(data);
		            $('#viewTicket').modal('show');
		        },
		        error: function (data) {
		            console.log('Error:', data);
		        }
		    });
		}

	
	</script>

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
