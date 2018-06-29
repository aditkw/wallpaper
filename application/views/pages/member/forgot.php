<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Reset Password</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

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
									<div class="tag-login text-uppercase text-center">Reset Password</div>
									
									<?php echo form_open('member/respass/'.$uri_3.'/'.$this->uri->segment(4)); ?>
										<div class="form-group">
											<label>Password Baru<span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="password" name="pass1" placeholder="Password" required>
											</div>
										</div>
										<div class="form-group">
											<label>Konfirmasi Password <span class="required">*</span></label>
											<div class="has-feedback">
												<input class="form-control" type="password" name="pass2" placeholder="Password" required>
											</div>
										</div>
										
										<div class="form-group">
											<button class="btn btn-success btn-login text-uppercase" type="submit" name="login" value="login">Ganti Password</button>
										</div>
									<?php echo form_close(); ?>
									
								</div><!-- /.box-cart -->
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
