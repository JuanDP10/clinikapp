<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Madrid_Barajas_H.svg/2048px-Madrid_Barajas_H.svg.png">

    @yield('title')

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <style>
      .profile_info {
      display: flex;
      gap: 10px; /* Espacio entre la imagen y el texto */
    }

    .profile_pic {
      flex-shrink: 0; /* Evita que la imagen se encoja */
    }

    .profile_text {
      display: flex;
      flex-direction: column; /* Asegura que el texto esté en una columna */
      justify-content: center; /* Alinea los textos verticalmente */
    }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title text-center">
              <a href="{{ url('home') }}" class="site_title"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Madrid_Barajas_H.svg/2048px-Madrid_Barajas_H.svg.png" style="width: 30px; height: 30px;"> <span style="font-weight: bold">Clinick App</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <div class="profile_pic">
                  <img src="{{ asset('images/' . (Auth::user()->foto ?? 'profile-img.png')) }}" 
                       alt="Imagen de perfil" 
                       class="img-circle profile_img" 
                       style="width: 60px; height: 60px;">
                </div>
                <div class="profile_text">
                  <span>Bienvenido,</span>
                  <h2 style="font-weight: bold">{{ auth()->user()->name ?? 'NN' }}</h2>
                </div>
              </div>
            </div>
            <div class="profile clearfix"> 
              <p class="text-center pt-2 text-white">{{ isset(Auth::user()->email) ? Auth::user()->email : '@' }}</p>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Inicio </a></li>
                  @if(Auth::user()->rol == 'admin')
                    <li><a href="{{ url('citas') }}"><i class="fa fa-calendar"></i> Citas </a></li>
                    <li><a href="{{ url('pacientes') }}"><i class="fa fa-users"></i> Pacientes </a></li>
                    <li><a href="{{ url('doctores') }}"><i class="fa fa-user-md"></i> Doctores </a></li>
                  @endif
                    <li><a href="{{ url('consultorios') }}"><i class="fa fa-stethoscope"></i> Consultorios </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Perfil" href="{{ url('profileview') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Actualizar Perfil" href="{{ url('profile') }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Configuración" href="#">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="{{ url('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="{{ url('profile') }}" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('images/' . (Auth::user()->foto ?? 'profile-img.png')) }}" alt="">{{ Auth::user()->name ?? 'NN' }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right mt-4" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="{{ url('profileview') }}"> Ver Perfil</a>
                      <a class="dropdown-item"  href="{{ url('profile') }}"> Actualizar Perfil</a>
                      <a class="dropdown-item"  href="#"><span>Configuración</span></a>
                      <a class="dropdown-item"  href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->

          @yield('content')

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Clinick App 2024
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
  </body>
</html>
