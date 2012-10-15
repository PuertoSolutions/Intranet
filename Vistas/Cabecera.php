<?php require_once('Auxiliares/Parametros.php'); ?>
  <head>
    <meta charset="utf-8">
    <title><?php echo Parametros::$NombreWeb; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="<?php echo Parametros::$Autor; ?>">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo Parametros::$URLLocal; ?>"><?php echo Parametros::$NombreWeb; ?></a>
          <?php
          	if (isset($_SESSION['Nick'])) { ?>
				  <div class="btn-group pull-right">
		          	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
		          		<i class="icon-user"></i> <?php echo $_SESSION['Nick']; ?><span class="caret"></span>
		      		</a>
		      		<ul class="dropdown-menu">
		      			<li><a href="#">Profile</a></li>
		      			<li class="divider"></li>
		      			<li><a href="?P=Salir">Salir</a></li>
		  			</ul>
				  </div> <?php
			  }
          ?>          
          <div class="nav-collapse">
            <ul class="nav">
              <li><ul class="nav">
				  <li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="?P=Clientes">Clientes</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Otro item</a></li>
				    </ul>
				  </li>
				</ul></li>
              <li><ul class="nav">
				  <li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administraci&oacute;n<b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="?P=Actas">Actas</a></li>
				      <li><a href="#">Reuniones</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Ingresos</a></li>
				      <li><a href="#">Adelantos</a></li>
				      <li><a href="#">Compras</a></li>
				    </ul>
				  </li>
				</ul></li>
              <li><ul class="nav">
				  <li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dise&ntilde;o<b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="#">Algo</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Otro item</a></li>
				    </ul>
				  </li>
				</ul></li>
				<li><ul class="nav">
				  <li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hardware<b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="#">Algo</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Otro item</a></li>
				    </ul>
				  </li>
				</ul></li>
				<li><ul class="nav">
				  <li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Software<b class="caret"></b></a>
				    <ul class="dropdown-menu">
				      <li><a href="#">Algo</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Otro item</a></li>
				    </ul>
				  </li>
				</ul></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>