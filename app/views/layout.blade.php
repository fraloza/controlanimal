<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'CONTROL ANIMAL')</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        {{ HTML::style('assets/css/bootstrap.min.css'); }}
        {{ HTML::style('assets/css/font-awesome.min.css'); }}

        {{ HTML::style('assets/css/dataTables.bootstrap.css'); }}
        {{ HTML::style('assets/css/sb-admin.css'); }}

        {{ HTML::style('assets/css/jquery-ui.min.css'); }}

        <!-- basic scripts -->
        {{ HTML::script('assets/js/jquery-1.10.2.js'); }}
        {{ HTML::script('assets/js/jquery-ui.min.js'); }}
        
    </head>
    <body>
        <div id="wrapper">
            
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">CONTROL ANIMAL</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <small>Bienvenido,</small>
                            {{ Auth::user()->name }}
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="logOut">
                                    <i class="fa fa-sign-out fa-fw"></i>
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->

                    </li>      
                </ul>

            </nav>

            <nav class="navbar-default navbar-static-side" role="navigation" id="menu_main">
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Bienvenido</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="contenido">
                    
                </div>
            </div>


        </div>

        {{ HTML::script('assets/js/bootstrap.min.js'); }}
        <div id="js-menu"></div>	
        
        {{ HTML::script('assets/js/bootbox.min.js'); }}

        {{ HTML::script('assets/js/dataTables/jquery.dataTables.min.js'); }}
        {{ HTML::script('assets/js/dataTables/dataTables.bootstrap.js'); }}

        <!-- funciones -->

        {{ HTML::script('assets/js/funciones.js'); }}
        {{ HTML::script('assets/js/validaciones.js'); }}

    </body>
</html>