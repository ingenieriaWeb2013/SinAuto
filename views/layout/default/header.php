<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="<?php echo $_layoutParams['ruta_img']; ?>favicon.png" type="image/x-icon">
		<title>Motor - Vehicle Marketplace</title>
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
</head>
<body>

	<header>
		<div id="top_toolbar" class="clearfix">
			<div class="container">
				<ul class="top_toolbar_menu">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="about.html">Help</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
				<div id="top_toolbar_user_lng">
					<div>
						<a id="language_button" class="language">
							<img src="<?php echo $_layoutParams['ruta_img']; ?>en.png" alt="English">English
						</a>
						<ul id="language_selection">
							<li><img src="<?php echo $_layoutParams['ruta_img']; ?>de.png" alt="Deutsch"><a href="#">Deutsch</a></li>
							<li><img src="<?php echo $_layoutParams['ruta_img']; ?>it.png" alt="Italiano"><a href="#">Italiano</a></li>
							<li><img src="<?php echo $_layoutParams['ruta_img']; ?>fr.png" alt="Francais"><a href="#">Francais</a></li>
							<li><img src="<?php echo $_layoutParams['ruta_img']; ?>es.png" alt="Espanol"><a href="#">Espanol</a></li>
						</ul>
					</div>

					<a href="#login_form" class="user show_login_form">
						Login here
					</a>
				</div>
				<div class="login_form_modal_container">
					<div id="login_form" class="box">
						<h3>User login</h3>
						<div class="box-content clearfix">
							<form action="#">
								<input type="text" placeholder="Enter your email" name="email">
								<input type="password" placeholder="Enter your password" name="pass">
								<label for="remember" class="custom_checkbox remember_me"><input type="checkbox" name="remember" id="remember">Remember me</label>
								<a class="button submit red right">Login</a>
								<a href="#" class="forgotten_pass right">Forgot your password?</a>
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
						<li class="current_menu_ancestor"><a href="index.html">Home</a>
							<ul>
								<li class="active"><a href="index.html">Home 1</a></li>
								<li><a href="index2.html">Home 2</a></li>
								<li><a href="index3.html">Home 3</a></li>
							</ul>
						</li>
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="add_item.html">Add item</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="index.html">Home 1</a></li>
								<li><a href="index2.html">Home 2</a></li>
								<li><a href="index3.html">Home 3</a></li>
								<li><a href="item.html">Single item</a></li>
								<li><a href="results.html">No results</a></li>
								<li><a href="results_list.html">List results</a></li>
								<li><a href="results_grid.html">Grid results</a></li>
								<li><a href="single.html">Single post</a></li>
								<li><a href="under_construction.html">Under construction</a></li>
								<li><a href="tables.html">Tables and Priceboxes</a></li>
								<li><a href="#">Second Level</a>
									<ul>
										<li><a href="#">Dummy item</a></li>
										<li><a href="#">Third level</a>
											<ul>
												<li><a href="#">Dummy item</a></li>
												<li><a href="#">Dummy item</a></li>
												<li><a href="#">Dummy item</a></li>
											</ul>
										</li>
										<li><a href="#">Dummy item</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="results_list.html">Buy</a></li>
						<li><a href="blog.html">News</a></li>
					</ul>
					<div id="responsive_navigation">
						<select class="custom_select nav-responsive">
							<option value="">Navigate...</option>
							<option value="index.html" selected=""> Home 1</option>
							<option value="index2.html"> -  Home 2</option>
							<option value="index3.html"> -  Home 3</option>
							<option value="about.html"> -  About</option>
							<option value="add_item.html"> -  Add item</option>
							<option value="blog.html"> -  Blog</option>
							<option value="contact.html"> -  Contact</option>
							<option value="item.html"> -  Single item</option>
							<option value="results.html"> -  No results</option>
							<option value="results_list.html"> -  List results</option>
							<option value="results_grid.html"> -  Grid results</option>
							<option value="single.html"> -  Single post</option>
							<option value="under_construction.html"> -  Under construction</option>
							<option value="tables.html"> -  Tables and Priceboxes</option>
							<option value="results_list.html"> Buy</option>
							<option value="blog.html"> News</option>
						</select>
					</div>

				</nav>
				<div id="add_listing" class="grid_3">
					<a href="add_item.html" class="button green big wide">+ Add listing</a>
				</div>
			</div>
		</div>
	</header>