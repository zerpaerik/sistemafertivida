<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FertiVida | Admin</title>
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
            <h1 class="m-0 text-dark">Orden</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear Orden</li>
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
          
              
              </div>

              <br>


              <form method="get" action="ordenes-create">		
              {{ csrf_field() }}  

              
              <div class="row" style="margin-left:20px;">
                  <div class="col-md-4">
                    <label for="exampleInputEmail1">Buscar Paciente</label>
                    <input type="text" class="form-control" id="el1" name="pac" placeholder="Buscar por dni" onsubmit="datapac()">
                  </div>

                  <div class="col-md-2" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                  </div>
              </div>

              </form>


                  <br>

              <form method="post" action="ordenes/create" >			
              {{ csrf_field() }}  	
                @if($paciente && $res == 'SI')
                  <input type="hidden" name="paciente" value="{{$paciente->id}}">
                  <p style="margin-left:20px;">Datos de Paciente</p>
                  <div class="row" style="background:yellowgreen;margin-left:20px;">
                    <div class="col-md-2">
                      <strong>Nombres:</strong>{{$paciente->nombres}}
                    </div>
                    <div class="col-md-2">
                      <strong>Apellidos:</strong>{{$paciente->apellidos}}
                    </div>
                    <div class="col-md-2">
                      <strong>TipoDoc:</strong>{{$paciente->tipo_doc}}
                    </div>
                    <div class="col-md-2">
                      <strong>DNI:</strong>{{$paciente->dni}}
                    </div>
                    
                    <div class="col-md-2">
                      <strong>Teléfono:</strong>{{$paciente->telefono}}
                    </div>
                    
                    </div>
                  @else
                  <label for="exampleInputEmail1" style="margin-left:20px;">NO EXISTE EL PACIENTE</label>
                  @endif

                  <br><br>


              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#serv">Seleccionar servicios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#anal">Seleccionar analisis</a>
                  
                </li>
              
              
              </ul>

              <div class="tab-content">


              <div class="tab-pane container active" id="serv">
                  <div class="card-body">

                  <!-- /.sheepit servicios -->

                    <div id="laboratorios" class="embed ">
                    
                    <!-- Form template-->
                    <div id="laboratorios_template" class="template row">

                        <label for="laboratorios_#index#_laboratorio" class="col-sm-1 control-label">Servicios</label>
                        <div class="col-sm-4">
                          <select id="laboratorios_#index#_laboratorio" name="id_laboratorio[laboratorios][#index#][laboratorio]" class="form-control">
                            <option value="1">Seleccionar Servicio</option>
                            @foreach($servicios as $pac)
                              <option value="{{$pac->id}}">
                                {{$pac->nombre}}
                              </option>
                            @endforeach
                          </select>
                        </div>

                        <a id="laboratorios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <!-- /Form template-->
                    
                    <!-- No forms template -->
                    <div id="laboratorios_noforms_template" class="noItems col-sm-12 text-center">Ningún servicio</div>
                    <!-- /No forms template-->
                    
                    <!-- Controls -->
                    <div id="laboratorios_controls" class="controls col-sm-11 col-sm-offset-1">
                        <div id="laboratorios_add" class="btn btn-default form add"><a><span><i class="fa fa-plus-circle"></i> Agregar servicio</span></a></div>
                        <div id="laboratorios_remove_last" class="btn form removeLast"><a><span><i class="fa fa-close-circle"></i> Eliminar ultimo</span></a></div>
                        <div id="laboratorios_remove_all" class="btn form removeAll"><a><span><i class="fa fa-close-circle"></i> Eliminar todos</span></a></div>
                    </div>
                    <!-- /Controls -->
                    
                </div>

              
                  <!-- /.sheepit servicios -->                   
                  
                  </div>
              </div>

              <div class="tab-pane container" id="anal">

                <div class="card-body">

                 <!-- /.sheepit anal -->

                 <div id="servicios" class="embed ">
                    
                    <!-- Form template-->
                    <div id="servicios_template" class="template row">

                        <label for="servicios_#index#_servicio" class="col-sm-1 control-label">Analisis</label>
                        <div class="col-sm-4">
                          <select id="servicios_#index#_servicio" name="id_servicio[servicios][#index#][servicio]" class="form-control">
                            <option value="1">Seleccionar Analisis</option>
                            @foreach($analisis as $anali)
                              <option value="{{$anali->id}}">
                                {{$anali->nombre}}
                              </option>
                            @endforeach
                          </select>
                        </div>

                        <a id="servicios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <!-- /Form template-->
                    
                    <!-- No forms template -->
                    <div id="servicios_noforms_template" class="noItems col-sm-12 text-center">Ningún Analisis</div>
                    <!-- /No forms template-->
                    
                    <!-- Controls -->
                    <div id="servicios_controls" class="controls col-sm-11 col-sm-offset-1">
                        <div id="servicios_add" class="btn btn-default form add"><a><span><i class="fa fa-plus-circle"></i> Agregar Analisis</span></a></div>
                        <div id="servicios_remove_last" class="btn form removeLast"><a><span><i class="fa fa-close-circle"></i> Eliminar ultimo</span></a></div>
                        <div id="servicios_remove_all" class="btn form removeAll"><a><span><i class="fa fa-close-circle"></i> Eliminar todos</span></a></div>
                    </div>
                    <!-- /Controls -->
                    
                </div>

              
                  <!-- /.sheepit anal -->     

                  
                </div>
              
              </div>



              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>

         


            
              <!-- /.card-header -->
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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

$(document).ready(function() {

$(".monto").keyup(function(event) {
  var montoId = $(this).attr('id');
  var montoArr = montoId.split('_');
  var id = montoArr[1];
  var montoH = parseFloat($('#servicios_'+id+'_montoHidden').val());
  var monto = parseFloat($(this).val());
  $('#servicios_'+id+'_montoHidden').val(monto);
  calcular();
  calculo_general();
});

$(".montol").keyup(function(event) {
  var montoId = $(this).attr('id');
  var montoArr = montoId.split('_');
  var id = montoArr[1];
  var montoH = parseFloat($('#laboratorios_'+id+'_montoHidden').val());
  var monto = parseFloat($(this).val());
  $('#laboratorios_'+id+'_montoHidden').val(monto);
  calcular();
  calculo_general();
});

$(".abonoL, .abonoS").keyup(function(){
  var total = 0;
  var selectId = $(this).attr('id');
  var selectArr = selectId.split('_');
  
  if(selectArr[0] == 'servicios'){
      if(parseFloat($(this).val()) == parseFloat($("#servicios_"+selectArr[1]+"_monto").val())){
          alert('La cantidad insertada en abono es mayor al monto.');
          $(this).val('0.00');
          calculo_general();
      } else {
          calculo_general();
      }
  } else {
    if(parseFloat($(this).val()) == 999999){
          alert('Debe verificar la cantidad.');
          $(this).val('0.00');
          calculo_general();
      } else {
          calculo_general();
      }
  }
});

var botonDisabled = true;

// Main sheepIt form
var phonesForm = $("#laboratorios").sheepIt({
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

});



$(document).on('change', '.selectLab', function(){
  var labId = $(this).attr('id');
  var labArr = labId.split('_');
  var id = labArr[1];

  $.ajax({
     type: "GET",
     url:  "productos/getProducto/"+$(this).val(),
     success: function(a) {
        $('#laboratorios_'+id+'_montoHidden').val(a.precio);
        $('#laboratorios_'+id+'_monto').val(a.precio);
        var total = parseFloat($('#total').val());
        $("#total").val(total + parseFloat(a.precio));
        calcular();
        calculo_general();
     }
  });
})
});


function calcular() {
  var total = 0;
      $(".monto").each(function(){
        total += parseFloat($(this).val());
      })

      $(".montol").each(function(i){
        total += parseFloat($(this).val() * $("#laboratorios_"+i+"_abonoL").val());
      })

      $(".montop").each(function(){
        total += parseFloat($(this).val());
      })

      $("#total").val(total);
}

function calculo_general() {
  var total = 0;
  $(".abonoL").each(function(){
    total += parseFloat($(this).val());
  })

  $(".abonoS").each(function(){
    total += parseFloat($(this).val());
  })

  $("#total_a").val(total);
  $("#total_g").val(parseFloat($("#total").val()) - parseFloat(total));
}



</script>



</body>
</html>
