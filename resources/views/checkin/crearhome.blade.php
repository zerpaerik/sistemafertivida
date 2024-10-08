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
            <h1 class="m-0 text-dark">Ingreso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Movimientos</a></li>
              <li class="breadcrumb-item active">Ingreso</li>
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
              {{ csrf_field() }}                
                    <div class="card-body">
                    <form method="get" action="checkin-crear-{{$id}}">					

                    <div class="row">
                  <div class="col-md-4">
                    <label for="exampleInputEmail1">Buscar Huesped</label>
                    <input type="text" class="form-control" id="el1" name="pac" placeholder="Buscar por dni" onsubmit="datapac()">
                  </div>

                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
                  <div class="col-md-5">
                  <label>Crear Huesped</label><br>
                  <a class="btn btn-primary btn-sm" href="{{route('clientes.create1')}}">
                              <i class="fas fa-add">
                              </i>
                              Crear

                              </a>                  </div>
                  </form>

                  
                  </div>
                  <br>
                  <form method="post" action="checkin/create" >			
                  {{ csrf_field() }}  

                  <div class="row">
                  @if($paciente && $res == 'SI')
                  <div class="col-md-8">
                  <label>Datos de Huesped</label>
                  <p>{{$paciente->nombre}} {{$paciente->responsable}} Documento: {{$paciente->identificacion}}
                  </div>

                  @else
                
                  @endif
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputEmail1">Habitación Seleccionada:</label>
                    <p>{{$analisis->nombre}} {{$analisis->descripcion}}
                  </div>
                  <div class="col-md-3">
                  <img src="fotos/{{$analisis->foto}}" alt="Hab" width="80"> 
                  </div>
          

                  </div>
                  <div class="row">

                  <div class="col-md-4">
                  <label>Tipo de Pago</label>
                        <select class="form-control" name="tipopago">
							<option value="EF">EF</option>
                            <option value="TJ">TJ</option>
							
                        </select>
                  </div>

                  <div class="col-md-4">
                  <label>Horas</label>
                        <select class="form-control" name="tiempo">
						              	<option value="6">6 HRS</option>
                            <option value="12">12 HRS</option>
                            <option value="24">1 DIA</option>
                            <option value="48">2 DIAS</option>
                            <option value="72">3 DIAS</option>
                            <option value="96">4 DIAS</option>
                            <option value="120">5 DIAS</option>
                        </select>
                  </div>

                  <div class="col-md-4">
                    <label for="exampleInputEmail1">Precio</label>
                    <input type="float" class="form-control" id="email" name="precio" placeholder="Precio" required>
                  </div>
                  </div>
             
            
          
                  <br>


            <div class="row">
            <label class="col-sm-12 alert"><i class="fa fa-tasks" aria-hidden="true"></i> Productos seleccionados</label>
            <!-- sheepIt Form -->
            <div id="servicios" class="embed ">
            
                <!-- Form template-->
                <div id="servicios_template" class="template row">

                    <label for="servicios_#index#_servicio" class="col-sm-3 control-label">Productos</label>
                    <div class="col-sm-4">

                      <select id="servicios_#index#_servicio"  name="id_servicio[servicios][#index#][servicio]" class="selectServ form-control">
                        <option value="">Productos</option>
                        @foreach($productos as $pac)
                          <option value="{{$pac->id}}">
                            {{$pac->nombre}}
                          </option>
                        @endforeach
                      </select>
                     
                    </div>

                    <label for="servicios_#index#_monto" class="col-sm-2 control-label">Monto</label>
                    <div class="col-sm-3">
                      <input id="servicios_#index#_montoHidden" name="monto_h[servicios][#index#][montoHidden]" class="number" type="hidden" value="">

                      <input id="servicios_#index#_monto" name="monto_s[servicios][#index#][monto] type="text" class="number form-control monto" placeholder="Monto" data-toggle="tooltip" data-placement="bottom" title="Monto" value="0.00">
                    </div>

                   

                    <a id="servicios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </div>
                <!-- /Form template-->
                
                <!-- No forms template -->
                <div id="servicios_noforms_template" class="noItems col-sm-12 text-center">Ningún Producto</div>
                <!-- /No forms template-->
                
                <!-- Controls -->
                <div id="servicios_controls" class="controls col-sm-11 col-sm-offset-1">
                    <div id="servicios_add" class="btn btn-default form add"><a><span><i class="fa fa-plus-circle"></i> Agregar Producto</span></a></div>
                    <div id="servicios_remove_last" class="btn form removeLast"><a><span><i class="fa fa-close-circle"></i> Eliminar ultimo</span></a></div>
                    <div id="servicios_remove_all" class="btn form removeAll"><a><span><i class="fa fa-close-circle"></i> Eliminar todos</span></a></div>
                </div>
                <!-- /Controls -->
                
            </div>
            <!-- /sheepIt Form --> 
          </div>
        
           
                 @if($paciente)
                <input type="hidden" name="paciente" value="{{$paciente->id}}">
                 @endif

                 <input type="hidden" name="habitacion" value="{{$id}}">



        
        
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

<!-- sheepit -->

<script src="../../plugins/sheepit/jquery.sheepItPlugin.min.js"></script>

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
function datapac(){
      
      $('#el1').on('submit',function(){
           var link;
             link = '/solicitudes/dataPacientes/'+$(this).val();
   
   
           $.ajax({
                  type: "get",
                  url:  link,
                  success: function(a) {
                     $('#pacientes').html(a);
                  }
           });
   
         });
       }

</script>

<script>

$(document).on('change','.selectServ',function(){
      var labId = $(this).attr('id');
      var labArr = labId.split('_');
      var id = labArr[1];

      $.ajax({
         type: "GET",
         url:  "productos/getProducto/"+$(this).val(),
         success: function(a) {
           
            $('#servicios_'+id+'_montoHidden').val(a.precio);
            $('#servicios_'+id+'_monto').val(a.precio);
          
         }
      });
    })

var botonDisabled = true;

    // Main sheepIt form
    var phonesForm = $("#servicios").sheepIt({
        separator: '',
        allowRemoveCurrent: true,
        allowAdd: true,
        allowRemoveAll: true,
        allowRemoveLast: true,

        // Limits
        maxFormsCount: 10,
        minFormsCount: 1,
        iniFormsCount: 0,

        removeAllConfirmationMsg: 'Seguro que quieres eliminar todos?',
        afterRemoveCurrent: function(source, event){
          calcular();
          calculo_general();
        }
    });

</script>

<script>

  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
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