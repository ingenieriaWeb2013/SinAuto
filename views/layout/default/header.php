<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="<?php echo $_layoutParams['ruta_img']; ?>favicon.png" type="image/x-icon">
		<title>SinAuto</title>
		<meta name="keywords" content="Motor, Vehicle, Marketplace"> 
		<meta name="description" content="Motor is a vehicle marketplace template">
		<meta name="author" content="ABdev">		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
               
	
		<link rel="stylesheet" type="text/css" media="all" id="font_css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300">
		<link rel="stylesheet" type="text/css" media="all" id="icon_fontawesome_css" href="<?php echo $_layoutParams['ruta_css']; ?>font-awesome.css">
		<link rel="stylesheet" type="text/css" media="all" id="icon_icomoon_css" href="<?php echo $_layoutParams['ruta_css']; ?>icomoon.css">
		<link rel="stylesheet" type="text/css" media="all" id="fancybox-css" href="<?php echo $_layoutParams['ruta_css']; ?>jquery.fancybox-1.3.4.css">
		<link rel="stylesheet" type="text/css" media="all" id="rs-settings-css" href="<?php echo $_layoutParams['ruta_css']; ?>revslider.css">
		<link rel="stylesheet" type="text/css" media="all" id="main_css" href="<?php echo $_layoutParams['ruta_css']; ?>style.css">
		<link rel="stylesheet" type="text/css" media="all" id="responsive_css" href="<?php echo $_layoutParams['ruta_css']; ?>responsive.css">
                <script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-1.9.1.min.js"></script>
</head>
<body>

	<header>
		<div id="top_toolbar" class="clearfix">
			<div class="container">
				<ul class="top_toolbar_menu">
					<li><a href="index.html">Mi Cuenta</a></li>
					<li><a href="about.html">Vender</a></li>
					<li><a href="about.html">Configuraci&oacute;n</a></li>
				</ul>
				<div id="top_toolbar_user_lng">
					<a href="#login_form" class="user show_login_form">
						Ingresar
					</a>
				</div>
				<div class="login_form_modal_container">
					<div id="login_form" class="box">
						<h3>Entrar a SinAuto</h3>
						<div class="box-content clearfix">
							<form action="login/ingresar">
								<input type="text" placeholder="usuario@ejemplo.com" name="email">
								<input type="password" placeholder="Contraseña" name="pass">
								<label for="remember" class="custom_checkbox remember_me"><input type="checkbox" name="remember" id="remember">Recordarme</label>
								<a class="button submit red right">Entrar</a>
								<a href="#" class="forgotten_pass right">¿Olvido su contraseña?</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="header_main" class="clearfix">
			<div class="container_12">
				<div id="logo" class="grid_3">
					<img src="<?php echo $_layoutParams['ruta_img']; ?>logo.png" alt="Motor Logo">
				</div>
				<nav class="grid_6">
					<ul id="main_menu" class="clearfix">
						<li class="current_menu_ancestor"><a href="index.html">Incio</a></li>
                                                <li><a href="#">Acerca</a></li>
                                        </ul>
				</nav>
				<div id="add_listing" class="grid_3">
					<a href="publicar" class="button green big wide">Publicar</a>
				</div>
			</div>
		</div>
	</header>