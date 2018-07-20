<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="#">MEMBER LOGIN</a></li>
		</ol>
		<h2 class="ftimes">LOGIN</h2>
		<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
	</div><!-- /.map-halaman -->
</section>

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<?php if ($this->session->flashdata('error')):?>
							<div class='alert alert-danger'>
								<ul>
									<?php echo $this->session->flashdata('error'); ?>
								</ul>
							</div>
						<?php endif;?>
						<?php if ($this->session->flashdata('failed')):?>
							<div class='alert alert-danger'>
								<ul>
									<?php echo $this->session->flashdata('failed'); ?>
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
						<div class="tab-content">
							<div class="tab-pane active" id="login-form">
								<div class="box-login">
									<!-- <div class="tag-login text-uppercase text-center">Login Member</div> -->

									<?php echo form_open('member/auth'); ?>
										<input type="hidden" name="urel" value="">
										<input type="hidden" name="link" value="">
										<div class="form-group">
											<label>Email <span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="email" name="email" placeholder="Alamat Email" required>
												<span class="glyphicon glyphicon-envelope form-control-feedback text-xbabu"></span>
											</div>
										</div>

										<div class="form-group">
											<label>Password <span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="password" name="password" placeholder="Password" required>
												<span class="glyphicon glyphicon-lock form-control-feedback text-xbabu"></span>
											</div>
										</div>

										<div class="form-group">
											<button class="btn btn-success btn-login text-uppercase" type="submit" name="login" value="login">Login</button>
										</div>

										<div class="form-group">
											<a class="btn btn-primary btn-login text-uppercase" href="<?php echo site_url('registrasi') ?>">Register</a>
										</div>
									<?php echo form_close(); ?>

									<div class="text-daftar text-center">
										<a href="#lupa-form" data-toggle="tab">Lupa password ?</a><br>
										<a href="#kirim-form" data-toggle="tab">Tidak menerima email verifikasi ?</a>
									</div><!-- /.text-daftar -->
								</div><!-- /.box-cart -->
							</div><!-- /.tab-pane -->

							<div class="tab-pane" id="lupa-form">
								<div class="box-login">
									<?php echo form_open('member/forgot'); ?>
										<input type="hidden" name="urel" value="">
										<div class="tag-login text-uppercase text-center">Lupa Password</div>

										<div class="form-group">
											<label>Email <span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="email" name="email" placeholder="Alamat Email" required>
												<span class="glyphicon glyphicon-envelope form-control-feedback text-xbabu"></span>
											</div>
										</div>

										<div class="form-group">
											<button class="btn btn-success btn-login text-uppercase" type="submit" name="kirim">Submit</button>
										</div>
									<?php echo form_close(); ?>
									<div class="text-daftar text-center">
										Kembali ke form login? <a href="#login-form" data-toggle="tab">Klik disini</a>
									</div><!-- /.text-daftar -->
								</div><!-- /.box-cart -->
							</div><!-- /.tab-pane -->
							<div class="tab-pane" id="kirim-form">
								<div class="box-login">
									<?php echo form_open('member/reverify'); ?>
										<input type="hidden" name="urel" value="">
										<div class="tag-login text-uppercase text-center">Kirim Email Verifikasi</div>

										<div class="form-group">
											<label>Email <span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="email" name="email" placeholder="Alamat Email" required>
												<span class="glyphicon glyphicon-envelope form-control-feedback text-xbabu"></span>
											</div>
										</div>

										<div class="form-group">
											<button class="btn btn-success btn-login text-uppercase" type="submit" name="kirim">Submit</button>
										</div>
									<?php echo form_close(); ?>
									<div class="text-daftar text-center">
										* Pastikan email anda telah didaftarkan sebelumnya.<br>
										Kembali ke form login? <a href="#login-form" data-toggle="tab">Klik disini</a>
									</div><!-- /.text-daftar -->
								</div><!-- /.box-cart -->
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
