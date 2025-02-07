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
            <h1 class="m-0 text-dark">Crear Receta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Receta</a></li>
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
              @include('flash-message')

              <!-- /.card-header -->
              <!-- form start -->
                    <div class="card-body">
           


                  <br>

              <form method="post" action="recetas/create" >			
              {{ csrf_field() }}

              <div class="row">
                    <div class="col-md-6">
                      <label>Seleccione el paciente</label>
                        <select class="js-example-basic-single" name="paciente">
                         @foreach($pacientes as $pm)
						             <option value="{{$pm->id}}">{{$pm->dni}} - {{$pm->apellidos}},{{$pm->apellidos1}} {{$pm->nombres}}</option>
                         @endforeach
                        </select>
                   </div> 

                  
                  </div>
               
                  <br><br>
              
                    <label for="exampleInputEmail1">Seleccione los medicamentos e indicación</label>
                    <br><br>
            <!-- sheepIt Form -->
            <div id="laboratorios" class="embed ">
            
                <!-- Form template-->
                <div id="laboratorios_template" class="template row">

                    <label for="laboratorios_#index#_laboratorio" class="col-sm-1 control-label">Productos</label>
                    <div class="col-sm-2">
                      <select id="laboratorios_#index#_laboratorio" name="id_laboratorio[laboratorios][#index#][laboratorio]" class="selectLab form-control">
                        <option value="1">Seleccionar Medicamento</option>
                        @foreach($medicamentos as $pac)
                          <option value="{{$pac->id}}">
                            {{$pac->nombre}}
                          </option>
                        @endforeach
                      </select>
                    </div>

            
                 <label for="laboratorios_#index#_monto" class="col-sm-1 control-label">Indicación</label>
                  <div class="col-sm-6">
                  <input id="laboratorios_#index#_montoHidden" name="monto_h[laboratorios][#index#][montoHidden]" class="number" type="hidden" value="">

                      <input id="" name="monto_l[laboratorios][#index#][monto]" type="text" class="form-control montol" placeholder="Indicación" title="Indicación">
                    </div>
               






                    <a id="laboratorios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </div>
                <!-- /Form template-->
                
                <!-- No forms template -->
                <div id="laboratorios_noforms_template" class="noItems col-sm-12 text-center">Ningún laboratorios</div>
                <!-- /No forms template-->
                
                <!-- Controls -->
                <div id="laboratorios_controls" class="controls col-sm-11 col-sm-offset-1">
                    <div id="laboratorios_add" class="btn btn-default form add"><a><span><i class="fa fa-plus-circle"></i> Agregar Producto</span></a></div>
                    <div id="laboratorios_remove_last" class="btn form removeLast"><a><span><i class="fa fa-close-circle"></i> Eliminar ultimo</span></a></div>
                    <div id="laboratorios_remove_all" class="btn form removeAll"><a><span><i class="fa fa-close-circle"></i> Eliminar todos</span></a></div>
                </div>
                <!-- /Controls -->
                
            </div>
            <!-- /sheepIt Form --> 
             <br>

            <div class="row">
            <div class="col-md-3">
                        <label for="exampleInputEmail1">Necesita descanso médico?</label>
                        <select class="form-control" name="descanso" id="el2">
                        <option value="0">Seleccione</option>
                        <option value="1">SI</option>
                        <option value="2">NO</option>
                    </select>
              </div>

              <div style="margin: top 15px;" class="col-md-8" id="sesion" class="form-control">

              </div>


            </div>
						
					</div>

             
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

<script src="../../plugins/sheepit/jquery.sheepItPlugin.min.js"></script>


<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script type="text/javascript">
      $(document).ready(function(){
        $('#el2').on('change',function(){
          var link;
          if ($(this).val() == 1) {
            link = '/crear/descanso/';
          } else {
		    link = '/crear/descanso1/';
		  }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#sesion').html(a);
                 }
          });

        });
        

      });
       
</script>
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
    $('.js-example-basic-single').select2();
});

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
    maxFormsCount: 100,
    minFormsCount: 1,
    iniFormsCount: 0,

    removeAllConfirmationMsg: 'Seguro que quieres eliminar todos?',
    
    afterRemoveCurrent: function(source, event){
      calcular();
      calculo_general();
    }
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