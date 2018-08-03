<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Login - Wallpaper Indonesia</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="<?=site_url('dist/img/assets/logo-wall.png')?>" alt="">
			</div><!-- /.login-logo -->
			<div>
				<div class="row form-group">
					<!-- Menampilkan hasil kesalahan validasi dalam proses input dan update data -->
					<?php if (validation_errors()):?>
						<div class="col-md-12 wow fadeIn">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-close"></i> Alert!</h4>
								<ul>
									<?php echo validation_errors('<li>','</li>'); ?>
								</ul>
							</div><!-- /alert -->
						</div><!-- /col-12 -->
					<?php endif;?>

					<!-- Menampilkan hasil sukses dari proses input dan update data -->
					<?php if ($this->session->flashdata('success')): ?>
						<div class="col-md-12 wow fadeIn">
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Success!</h4>
								<?php echo $this->session->flashdata('success')?>
							</div><!-- /alert -->
						</div><!-- /col-12 -->
					<?php endif; ?>

					<!-- Menampilkan hasil kesalahan dari proses input dan update data -->
					<?php if ($this->session->flashdata('failed')): ?>
						<div class="col-md-12 wow fadeIn">
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-close"></i> Failed!</h4>
								<?php echo $this->session->flashdata('failed')?>
							</div><!-- /alert -->
						</div><!-- /col-12 -->
					<?php endif; ?>
				</div><!-- /row -->
			</div>
			<div class="login-box-body">
				<p class="login-box-msg"><strong>Silahkan login..</strong></p>
				<?php echo form_open('login/auth');?>
					<div class="form-group has-feedback">
						<input name="username" type="text" class="form-control" placeholder="Username">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input name="password" type="password" class="form-control" placeholder="Password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">
						</div><!-- /.col -->
						<div class="col-xs-4">
							<button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div><!-- /.col -->
					</div>
				<?php echo form_close();?>

			</div><!-- /.login-box-body -->
		</div><!-- /.login-box -->

		<!-- jQuery 2.1.4 -->
		<script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
