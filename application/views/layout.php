<!doctype html>
<html>
<head>

  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">


  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <!-- Use title if it's in the page YAML frontmatter -->
  <title><?php echo $site_name ?></title>

  <link href="<?php echo  base_url() ?>stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="<?php echo  base_url() ?>stylesheets/css/style.css" media="screen" rel="stylesheet" type="text/css" />

  <!--[if lt IE 9]>
  <script src="../../javascripts/vendor/html5shiv.js" type="text/javascript"></script>
  <script src="../../javascripts/vendor/excanvas.js" type="text/javascript"></script>
  <![endif]-->

  <script src="<?php echo  base_url() ?>javascripts/application.js" type="text/javascript"></script>
  <script src="<?php echo  base_url() ?>javascripts/myscripts.js" type="text/javascript"></script>
  
  <script src="<?php echo base_url()."javascripts/tinymce/js/tinymce/tinymce.min.js" ?>"></script>

  <script>
        tinymce.init({selector:'textarea',language : 'es',});
  </script>

  <!-- translation for calendar -->
  
    <script>
    $.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Dicicembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Hoy"
    };
    </script>     
  
  
</head>



<body>
<div class="navbar navbar-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid">

      <a class="brand" href="#"><?php echo $site_name ?></a>

      <!-- the new toggle buttons -->

      <ul class="nav pull-right">

        <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

        <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>

      </ul>

      
          

          <div class="nav-collapse nav-collapse-top collapse">

            <ul class="nav full pull-right">
              <li class="dropdown user-avatar">

                <!-- the dropdown has a custom user-avatar class, this is the small avatar with the badge -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span>
                      <img class="menu-avatar" src="<?php echo site_url("/")?>images/avatars/avatar1.jpg" /> <span>Alejandro Escamilla <i class="icon-caret-down"></i></span>
                    <span class="badge badge-dark-red">5</span>
                  </span>
                </a>

                <ul class="dropdown-menu">

                  <!-- the first element is the one with the big avatar, add a with-image class to it -->

                  <li class="with-image">
                    <div class="avatar">
                      <img src="../../images/avatars/avatar1.jpg" />
                    </div>
                    <span>John Smith</span>
                  </li>

                  <li class="divider"></li>

                  <li><a href="#"><i class="icon-user"></i> <span>Perfil</span></a></li>
                  <li><a href="#"><i class="icon-cog"></i> <span>Configuración</span></a></li>
                  <li><a href="#"><i class="icon-envelope"></i> <span>Mensajes</span> <span class="label label-dark-red pull-right">5</span></a></li>
                  <li><a href="#"><i class="icon-off"></i> <span>Salir</span></a></li>
                </ul>
              </li>
            </ul>

            <form class="navbar-search pull-right">
              <input type="text" class="search-query animated" placeholder="Buscar">
              <i class="icon-search"></i>
            </form>

            <ul class="nav pull-right">
              <li class="active"><a href="#" title="Go home"><i class="icon-home"></i> inicio</a></li>
              <li><a href="<?php echo site_url('users'); ?>" title="Manage users"><i class="icon-user"></i> Usuarios</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Some link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>


            </ul>

          </div>
      

    </div>
  </div>
</div><div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>

<div class="primary-sidebar">

  <!-- Main nav -->
  <ul class="nav nav-collapse collapse nav-collapse-primary">

    

        

            <li class="active">
              <span class="glow"></span>
              <a href="<?php echo site_url("/dashboard/") ?>">
                  <i class="icon-dashboard icon-2x"></i>
                  <span>Tablero</span>
              </a>
              
            </li>
            <li class="active">
              <span class="glow-"></span>
              <a href="<?php echo admin_url("/courses/") ?>">
                  <i class="icon-suitcase icon-2x"></i>
                  <span>Cursos</span>
              </a>
              
            </li>
              <li class="active-">
              <span class="glow"></span>
              <a href="<?php echo admin_url("/posts/") ?>">
                  <i class="icon-laptop icon-2x"></i>
                  <span>Posts</span>
              </a>
              
            </li>
              <li class="active-">
              <span class="glow"></span>
              <a href="<?php echo site_url("/projects/") ?>">
                  <i class="icon-legal icon-2x"></i>
                  <span>Incidencias</span>
              </a>
              
            </li>
              <li class="active-">
              <span class="glow"></span>
              <a href="<?php echo site_url("/projects/") ?>">
                  <i class="icon-folder-open icon-2x"></i>
                  <span>Documentos</span>
              </a>
              
            </li>
              <li class="active-">
              <span class="glow"></span>
              <a href="<?php echo site_url("/projects/") ?>">
                  <i class="icon-list icon-2x"></i>
                  <span>Reportes</span>
              </a>
              
            </li>

        

    

        

            <!--li class="dark-nav ">

              <span class="glow"></span>

              

              <a class="accordion-toggle collapsed " data-toggle="collapse" href="#zwz2Ux5SfP">
                  <i class="icon-beaker icon-2x"></i>
                    <span>
                      UI Lab
                      <i class="icon-caret-down"></i>
                    </span>

              </a>

              <ul id="zwz2Ux5SfP" class="collapse ">
                
                    <li class="">
                      <a href="../ui_lab/buttons.html">
                          <i class="icon-hand-up"></i> Buttons
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../ui_lab/general.html">
                          <i class="icon-beaker"></i> General elements
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../ui_lab/icons.html">
                          <i class="icon-info-sign"></i> Icons
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../ui_lab/grid.html">
                          <i class="icon-th-large"></i> Grid
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../ui_lab/tables.html">
                          <i class="icon-table"></i> Tables
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../ui_lab/widgets.html">
                          <i class="icon-plus-sign-alt"></i> Widgets
                      </a>
                    </li>
                
              </ul>

            </li-->

        

    

        

            <!--li class="">
              <span class="glow"></span>
              <a href="../forms/forms.html">
                  <i class="icon-edit icon-2x"></i>
                  <span>Forms</span>
              </a>
            </li>

        

    

        

            <li class="">
              <span class="glow"></span>
              <a href="../charts/charts.html">
                  <i class="icon-bar-chart icon-2x"></i>
                  <span>Charts</span>
              </a>
            </li>

        

    

        

            <li class="dark-nav ">

              <span class="glow"></span>

              

              <a class="accordion-toggle collapsed " data-toggle="collapse" href="#3z2CycFSTz">
                  <i class="icon-link icon-2x"></i>
                    <span>
                      Others
                      <i class="icon-caret-down"></i>
                    </span>

              </a>

              <ul id="3z2CycFSTz" class="collapse ">
                
                    <li class="">
                      <a href="../other/wizard.html">
                          <i class="icon-magic"></i> Wizard
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../other/login.html">
                          <i class="icon-user"></i> Login Page
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../other/sign_up.html">
                          <i class="icon-user"></i> Sign Up Page
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../other/full_calendar.html">
                          <i class="icon-calendar"></i> Full Calendar
                      </a>
                    </li>
                
                    <li class="">
                      <a href="../other/error404.html">
                          <i class="icon-ban-circle"></i> Error 404 page
                      </a>
                    </li>
                
              </ul>

            </li-->

        

    

  </ul>

  <div class="hidden-tablet hidden-phone">
    <div class="text-center" style="margin-top: 60px">
      <div class="easy-pie-chart-percent" style="display: inline-block" data-percent="89"><span>89%</span></div>
      <div style="padding-top: 20px"><b>Tareas</b></div>
    </div>

    <hr class="divider" style="margin-top: 60px">

    <div class="sparkline-box side">

      <div class="sparkline-row">
        <h4 class="gray"><span>Proyectos activos</span> 847</h4>
        <div class="sparkline big" data-color="gray"><!--28,11,24,24,8,20,26,22,16,6,12,15--></div>
      </div>

      <hr class="divider">
      <div class="sparkline-row">
        <h4 class="dark-green"><span>Presupuesto</span> $43.330</h4>
        <div class="sparkline big" data-color="darkGreen"><!--16,20,6,19,25,22,9,13,7,10,15,4--></div>
      </div>

      <hr class="divider">
      <div class="sparkline-row">
        <h4 class="blue"><span>Tareas</span> 223</h4>
        <div class="sparkline big" data-color="blue"><!--20,18,21,17,5,7,29,9,8,14,23,8--></div>
      </div>

      <hr class="divider">
    </div>
  </div>


</div>
<div class="main-content">
    {content}
</div>

</body>
</html>
