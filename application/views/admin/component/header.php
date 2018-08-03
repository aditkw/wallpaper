	<body class="hold-transition skin-yellow sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">

			<header class="main-header">
				<!-- Logo -->
				<a href="../../index2.html" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>W</b>I</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Wallpaper</b> Indonesia</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->

							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url('dist/img/assets/user-sign-icon-admin-baru.png');?>" class="user-image" alt="User Image">
									<span class="hidden-xs"><?=ucfirst($this->session->name)?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="<?php echo base_url('dist/img/assets/user-sign-icon-admin-baru.png');?>" class="img-circle" alt="User Image">
										<p>
											<?=ucfirst($this->session->name)?>
											<small>Hai <?php echo ucfirst($this->session->name) ?>, semangat kerja hari ini!</small>
										</p>
									</li>
									<!-- Menu Body -->
									<!-- <li class="user-body">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</li> -->
									<!-- Menu Footer-->
									<li class="user-footer">
										<!-- <div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div> -->
										<div class="pull-right">
											<a href="<?=site_url('logout')?>" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<!-- =============================================== -->
