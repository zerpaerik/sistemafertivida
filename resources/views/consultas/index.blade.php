<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MadreTeresa | Admin</title>
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
              <li class="breadcrumb-item active">Consultas</li>
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
              <form method="get" action="consultas">					
                  <label for="exampleInputEmail1">Filtros de Busqueda</label>

                    <div class="row">
                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Inicio</label>
                    <input type="date" class="form-control" value="{{$f1}}" name="inicio">
                  </div>

                  <div class="col-md-3">
                    <label for="exampleInputEmail1">Fecha Fin</label>
                    <input type="date" class="form-control" value="{{$f2}}" name="fin">
                  </div>
                  
                
                 
                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  </form>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Especialista</th>
                    <th>Tipo</th>
                    <th>RP</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($consultas as $an)
                  <tr>
                    <td>{{$an->id}}</td>
                    <td>{{date('d-M-y H:i', strtotime($an->fecha))}}</td>
                    <td>{{$an->nombres}} {{$an->apellidos}}</td>
                    <td>{{$an->namee}} {{$an->laste}}</td>
                    @if($an->tipo == 1)
                    <td><span class="badge bg-success">CONSULTA</span></td>
                    @elseif($an->tipo == 3)
                    <td><span class="badge bg-success">PEDIATRICA</span></td> 
                    @elseif($an->tipo == 4)
                    <td><span class="badge bg-success">MEDICINA GENERAL</span></td>
                    @else
                    <td><span class="badge bg-success">CONTROL</span></td>
                    @endif
                    <td>{{$an->nameo}} {{$an->lasto}}</td>

                    <td>
                    @if(Auth::user()->rol == 7)

                    @if($an->historia == 0)
                    <p>No ha sido atendido</p>

                    @else
                    <p>Ya fue atendido</p>

                    @endif


                    @endif

                    @if(Auth::user()->rol != 7)

                    <a class="btn btn-primary btn-sm" id="{{$an->id_atencion}}" onclick="viewh(this)">
                                    <i class="fas fa-eye">
                                    </i>
                                    Anotaciòn
                                </a>
                    @if($an->historia == 0)
                    @if($an->tipo == 1)

                    <a class="btn btn-danger btn-sm" href="historia-crear-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Historia
                          </a>
                      @foreach($histb as $historialbase)
                      @if($historialbase->id_paciente == $an->id_paciente && $historialbase->estatus == 0)
                      <a class="btn btn-primary btn-sm" href="historia-ant-reversar-{{$historialbase->id}}" onclick="return confirm('¿Desea resetear este registro?')">
                                    <i class="fas fa-eye">
                                    </i>
                                    Reset HistorialB
                                </a>
                      @else
                      @endif
                    @endforeach

                    @elseif($an->tipo == 3)
                    <a class="btn btn-danger btn-sm" href="historiap-crear-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              HistoriaP
                          </a>
                      @foreach($histb as $historialbase)
                      @if($historialbase->id_paciente == $an->id_paciente && $historialbase->estatus == 0)
                      <a class="btn btn-primary btn-sm" href="historia-ant-reversar-{{$historialbase->id}}" onclick="return confirm('¿Desea resetear este registro?')">
                                    <i class="fas fa-eye">
                                    </i>
                                    Reset HistorialB
                                </a>
                      @else
                      @endif
                      @endforeach

                    @elseif($an->tipo == 4)
                    <a class="btn btn-danger btn-sm" href="historiam-crear-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              HistoriaM
                          </a>
                      @foreach($histb as $historialbase)
                      @if($historialbase->id_paciente == $an->id_paciente && $historialbase->estatus == 0)
                      <a class="btn btn-primary btn-sm" href="historia-ant-reversar-{{$historialbase->id}}" onclick="return confirm('¿Desea resetear este registro?')">
                                    <i class="fas fa-eye">
                                    </i>
                                    Reset HistorialB
                                </a>
                      @else
                      @endif
                      @endforeach

                    @else
                    <a class="btn btn-danger btn-sm" href="control-crear-{{$an->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Control
                    </a>
                    @foreach($ant as $antecedentes)
                      @if($antecedentes->id_paciente == $an->id_paciente && $antecedentes->estatus == 0)
                      <a class="btn btn-primary btn-sm" href="controles-ant-reversar-{{$antecedentes->id}}" onclick="return confirm('¿Desea resetear este registro?')">
                                    <i class="fas fa-eye">
                                    </i>
                                    Reset Antecedentes
                                </a>
                      @else
                      @endif
                    @endforeach
                    @endif

                    @endif
                    @endif

                    </td>
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Especialista</th>
                    <th>Tipo</th>
                    <th>RP</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
<!-- page script -->
<script type="text/javascript">
		function viewh(e){
		    var id = $(e).attr('id');
		    
		    $.ajax({
		        type: "GET",
		        url: "/resultados/anotar/"+id,
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