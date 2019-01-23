<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS-->
    {!! Html::style('sb/vendor/bootstrap/css/bootstrap.min.css') !!}
    <!-- Custom fonts for this template-->
    {!! Html::style('sb/vendor/fontawesome-free/css/all.min.css') !!}
    <!-- Page level plugin CSS-->
    {!! Html::style('sb/vendor/datatables/dataTables.bootstrap4.css') !!}
    <!-- Custom styles for this template-->
    {!! Html::style('sb/css/sb-admin.css') !!}

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">A&A</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

        <!--
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        -->

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            &nbsp;
          </a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            &nbsp;
          </a>
        </li>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- Right Side Of Navbar -->
            

            <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
            @guest

            @else
              <a class="dropdown-item" href="#">Perfil: {{Auth::user()->perfil->perfil_nombre}}</a>
            @endguest
            
            <!--
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            -->
            <div class="dropdown-divider"></div>
            <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>-->
            @guest
            @else
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest

          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">

        @if( Auth::user()->perfil->perfil_nombre == 'Admin' )
          <li class="nav-item active">
            <a class="nav-link" href="{!!URL::to('/')!!}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Tiempo real</span>
            </a>
          </li>
        @endif

        @if( Auth::user()->perfil->perfil_nombre == 'Admin' )
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mantenedores</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Administración:</h6>
            <a class="dropdown-item" href="{!!URL::to('/productores')!!}">Productor</a>
            <a class="dropdown-item" href="{!!URL::to('/variedades')!!}">Variedades</a>
            <a class="dropdown-item" href="{!!URL::to('/calibres')!!}">Calibre</a>
            <a class="dropdown-item" href="{!!URL::to('/etiquetas')!!}">Etiqueta</a>
            <a class="dropdown-item" href="{!!URL::to('/embalajes')!!}">Embalaje</a>
            <a class="dropdown-item" href="{!!URL::to('/tolerancias')!!}">Tolerancia</a>
          </div>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{!!URL::to('/muestras/create')!!}">
            <i class="fas fa-fw fa-table"></i>
            <span>Muestras</span></a>
        </li>

        @if( Auth::user()->perfil->perfil_nombre == 'Admin' )
          <li class="nav-item">
            <a class="nav-link" href="{{ url('graficos') }}">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Grafico por fecha (muestras)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('graficoconsolidado') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Grafico Acumulado (Muestras)</span></a>
            </li>
        @endif
        @if( in_array(Auth::user()->perfil->perfil_nombre, ['Admin','Cliente']) )
          <li class="nav-item">
            <a class="nav-link" href="{{ url('reportes') }}">
              <i class="fas fa-fw fa-table"></i>
              <span>Reportes</span></a>
          </li>
        @endif
      </ul>




      <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © CPR</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    {!! Html::script('sb/vendor/jquery/jquery.min.js') !!}
    {!! Html::script('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    <!-- Core plugin JavaScript-->
    {!! Html::script('sb/vendor/jquery-easing/jquery.easing.min.js') !!}
    @yield('js')
    <!-- Page level plugin JavaScript-->
    {!! Html::script('sb/vendor/chart.js/Chart.min.js') !!}
    {!! Html::script('sb/vendor/datatables/jquery.dataTables.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js') !!}

    {!! Html::script('sb/vendor/datatables/dataTables.bootstrap4.js') !!}

    <!-- Custom scripts for all pages-->
    {!! Html::script('sb/js/sb-admin.min.js') !!}

    <!-- Demo scripts for this page-->
    {!! Html::script('sb/js/demo/datatables-demo.js') !!}
    {!! Html::script('sb/js/demo/chart-area-demo.js') !!}

    @stack('custom_js')
  </body>

</html>

