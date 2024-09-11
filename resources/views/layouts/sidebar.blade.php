@if(\Auth::user()->rol == 1)

<a href="{{route('home')}}" class="brand-link">
<img src="logo.png" class="img-circle elevation-2" alt="User Image" width="40">
      
      <span class="brand-text font-weight-light" style="margin-left:10px;">Admin Fertivida</span>
    </a>

<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Archivo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

         
              <li class="nav-item">
                <a href="{{route('analisis.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Analisis</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('servicios.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('paquetes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paquetes</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('pacientes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pacientes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('profesionales.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profesionales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('medicamentos.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicamentos</p>
                </a>
              </li>
            
  
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Consultas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('consultas.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista de Consultas</p>
                </a>
              </li>

              
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Recetas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('recetas.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>

              
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Ordenes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('ordenes.index')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Lista</p>
                </a>
              </li>

              
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


            <li class="nav-item">
                <a href="{{route('reporteprov')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Consultas por Provincia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('reporteref')}}" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Consultas por Referencia</p>
                </a>
              </li>

              
              
            </ul>
          </li>



          
        

     

     

        

       
         

        

        

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Administrativo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{route('users.password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Contraseña</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('usuarios.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('activos.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Activos</p>
                </a>
              </li>
            
              
            </ul>
          </li>

          


          
         
          
         
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    @endif

  







