<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Medical Help</title>

  <title>My Web Page</title>
<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<link rel="icon" type="image/png" href="{{ asset('dist/img/log.png') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
       
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="{{ asset('dist/img/LogoMH.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/Paciente" class="d-block">My Medical Help</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <script>
    document.addEventListener('DOMContentLoaded', function() {
        var navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(function(link) {
            if (link.getAttribute('href') === window.location.pathname) {
                link.classList.add('active');
            }
        });
    });
</script>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administracion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                    <a href="/Paciente" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pacientes</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="/Contrato" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contratos</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/Agenda" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agenda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Historia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/User" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="/Rol" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="/Ep" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eps</p>
                </a>
              </li>  
              <li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
            Cerrar Sesión
        </p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>      
            </ul>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
     <!-- Main content -->
     </section>
    <!-- /.content -->
  </div>
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/') }}" rel="stylesheet">
    <title>Usuarios</title>
</head>
<body>

</body>
</html>

</footer>
</html>
