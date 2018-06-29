<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Registrasi Member</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-content">
					
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<?php if ($this->session->flashdata('error')):?>
								<div class='alert alert-danger'>
									<ul>
										<?php echo $this->session->flashdata('error'); ?>
									</ul>
								</div>
							<?php endif;?>
							<?php if ($this->session->flashdata('success')):?>
								<div class='alert alert-success'>
									<ul>
										<?php echo $this->session->flashdata('success'); ?>
									</ul>
								</div>
							<?php endif;?>
							<div class="box-login">
								<div class="tag-konten">
									<div class="nama-tag-konten font-20">REGISTRASI MEMBER</div>
								</div><!-- /.tag-konten -->
								
								<?php echo form_open('member/reg'); ?>
									<input type="hidden" name="urel" value="">
									<input type="hidden" name="link" value="">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Nama Lengkap <span class="required">*</span></label>
												<div class="has-feedback">
													<input class="form-control" type="text" name="nama" placeholder="Nama Depan" required>
													<span class="glyphicon glyphicon-user form-control-feedback text-abu"></span>
												</div>
											</div>
										</div><!-- /.col -->
									</div><!-- /.row -->
									
									<div class="form-group">
										<label>No. Telp / Hp <span class="required">*</span></label>
										<div class="has-feedback">
											<input class="form-control" type="text" name="telp" placeholder="No. Telp / Hp" required>
											<span class="glyphicon glyphicon-phone form-control-feedback text-abu"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label>Email <span class="required">*</span></label>
										<div class="has-feedback">
											<input class="form-control" type="email" name="email" placeholder="Alamat Email" required>
											<span class="glyphicon glyphicon-envelope form-control-feedback text-abu"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label>Password <span class="required">*</span></label>
										<div class="has-feedback">
											<input class="form-control" type="password" name="pass1" placeholder="Password" required>
											<span class="glyphicon glyphicon-lock form-control-feedback text-abu"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label>Re-type Password <span class="required">*</span></label>
										<div class="has-feedback">
											<input class="form-control" type="password" name="pass2" placeholder="Re-type Password" required>
											<span class="glyphicon glyphicon-lock form-control-feedback text-abu"></span>
										</div>
									</div>
									
									<div class="form-group">
										<button class="btn btn-success btn-login text-uppercase" type="submit" name="kirim" value="submit">Submit</button>
									</div>
								<?php echo form_close(); ?>
								
								<div class="text-daftar text-center">
									Anda sudah memiliki akun? <a href="<?php echo site_url('member/login') ?>">Log In</a>
								</div><!-- /.text-daftar -->
							</div><!-- /.box-cart -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
