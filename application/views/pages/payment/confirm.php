<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="#">KONFIRMASI PEMBAYARAN</a></li>
		</ol>
		<h2 class="ftimes">KONFIRMASI PEMBAYARAN</h2>
		<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
	</div><!-- /.map-halaman -->
</section>

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-content">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="box-login">
								<div class="tag-konten">
									<div class="nama-tag-konten font-20">INFO REKENING</div>
								</div><!-- /.tag-konten -->
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<?php if ($this->session->flashdata('success')): ?>
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong><i class="fa fa-check text-success"></i></strong>
												<?php echo $this->session->flashdata('success') ?>
											</div>
										<?php elseif ($this->session->flashdata('failed')): ?>
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong><i class="fa fa-close text-danger"></i></strong>
												<?php echo $this->session->flashdata('failed') ?>
											</div>
										<?php endif ?>
									</div>
								</div>

								<?php echo form_open() ?>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Nama Lengkap <span class="required">*</span></label>
												<div class="has-feedback">
													<input class="form-control" type="text" name="nama" value="<?php echo $name = (!empty($_GET['order'])) ? $trans->transaction_name : ''; ?>" placeholder="Nama Lengkap" required>
													<span class="glyphicon glyphicon-user form-control-feedback text-xbabu"></span>
												</div>
											</div>

											<div class="form-group">
												<label>No. Telp / Hp <span class="required">*</span></label>
												<div class="has-feedback">
													<input class="form-control" type="text" name="telp" value="<?php echo $name = (!empty($_GET['order'])) ? $trans->transaction_phone : ''; ?>" placeholder="No. Telp / Hp" required>
													<span class="glyphicon glyphicon-phone form-control-feedback text-xbabu"></span>
												</div>
											</div>

											<div class="form-group">
												<label>Email <span class="required">*</span></label>
												<div class="has-feedback">
													<input class="form-control" type="email" name="email" value="<?php echo $name = (!empty($_GET['order'])) ? $trans->transaction_email : ''; ?>" placeholder="ex: example@mail.com" required>
													<span class="glyphicon glyphicon-envelope form-control-feedback text-xbabu"></span>
												</div>
											</div>

											<div class="form-group"></div>

											<div class="form-group">
												<label>ID Order <span class="required">*</span></label>
												<input class="form-control" type="text" name="notrans" value="<?php echo $name = (!empty($_GET['order'])) ? $_GET['order'] : ''; ?>" placeholder="ID Order" required>
											</div>
										</div><!-- /.col -->

										<div class="col-sm-6">
											<div class="form-group">
												<label>Nama Bank <span class="required">*</span></label>
												<input class="form-control" type="text" name="nama_bank" value="" placeholder="Nama Bank" required>
											</div>

											<div class="form-group">
												<label>No. Rekening <span class="required">*</span></label>
												<input class="form-control" type="text" name="no_rek" value="" placeholder="No. Rekening" required>
											</div>

											<div class="form-group">
												<label>Atas Nama <span class="required">*</span></label>
												<input class="form-control" type="text" name="atas_nama" value="" placeholder="Atas Nama" required>
											</div>
										</div><!-- /.col -->
									</div><!-- /.row -->
									<div class="form-group"></div>

									<div class="tag-konten">
										<div class="nama-tag-konten font-20">DATA PEMBAYARAN</div>
									</div><!-- /.tag-konten -->

									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Jumlah Pembayaran <span class="required">* **</span></label>
												<div id="jumlah">
												<input class="form-control" type="text" name="total_bayar" onKeyUp="angka(this)" value="<?php echo $name = (!empty($_GET['order'])) ? $trans->transaction_total : ''; ?>" placeholder="ex: 250000" required>
												</div>
											</div>

											<div class="form-group">
												<label>Tanggal Pembayaran <span class="required">*</span></label>
												<div class="has-feedback">
													<input class="form-control tgl-picker" type="text" name="tgl_bayar" value="" placeholder="YYYY-MM-DD" required>
													<span class="glyphicon glyphicon-calendar form-control-feedback text-xbabu"></span>
												</div>
											</div>

											<div class="form-group">
												<label>Rekening Tujuan <span class="required">*</span></label>
												<select class="form-control" name="rek_tujuan" required>
													<option selected disabled>Pilih Rekening Tujuan</option>
													<?php foreach ($bank as $bank): ?>
														<option value="<?php echo $bank->bank_id ?>"><?php echo ucwords($bank->bank_name).' - '.$bank->bank_no.' a/n '.$bank->bank_account ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div><!-- /.col -->

										<div class="col-sm-6">
											<div class="form-group">
												<label>Catatan (ubah catatan sebelumnya)</label>
												<textarea class="form-control" name="catatan" rows="5" placeholder="Ketik disini..."></textarea>
											</div>
										</div><!-- /.col -->
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<span class="help-block">*) Wajib diisi. <br> **)Tanpa menggunakan titik(.) atau koma(,).</span>
											</div>
										</div>
									</div><!-- /.row -->

									<div class="form-group">
										<button class="btn btn-success btn-login text-uppercase" type="submit" name="confirm" value="submit">Submit</button>
									</div>
								<?php echo form_close() ?>
							</div><!-- /.box-cart -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
<script>
	function angka(x)
	{
		var number = /^[0-9]+$/ ;

		if(x.value.match(number))
		{
			x.value;
			return true;
		}

		else
		{
			x.value = "";
			return false;
		}
	}
</script>
