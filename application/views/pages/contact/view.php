<div class="kontak">
<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="#">HUBUNGI KAMI</a></li>
		</ol>
		<h2 class="ftimes">HUBUNGI KAMI</h2>
		<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
	</div><!-- /.map-halaman -->
</section>

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-content">
					<div class="row">
						<div class="col-md-12">
							<h2 class="tag-page">Hubungi Kami</h2>
					   	<div class="box-kontak">

								<div class="row">
									<div class="col-md-8">
										<div class="box-form">
										<?php echo form_open() ?>
											<div class="form-group">
												<label>Name</label>
												<div class="has-feedback">
													<input class="form-control" type="text" name="nama" value="" placeholder="Name" required />
													<span class="glyphicon glyphicon-user form-control-feedback text-xbabu"></span>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label>Telphone</label>
														<div class="has-feedback">
															<input class="form-control with-border" type="text" name="telp" value="" placeholder="Telphone" required />
															<span class="glyphicon glyphicon-phone form-control-feedback text-xbabu"></span>
														</div>
													</div>
												</div>

												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label>Email</label>
														<div class="has-feedback">
															<input class="form-control with-border" type="email" name="email" value="" placeholder="Email" />
															<span class="glyphicon glyphicon-envelope form-control-feedback text-xbabu"></span>
														</div>
													</div>
												</div>
											</div><!-- /.row -->

											<div class="form-group">
												<label>Message</label>
												<textarea class="form-control with-border" name="pesan" rows="4" placeholder="Type message here..." required></textarea>
											</div>

											<div class="form-group">
												<input class="btn btn-success btn-kontak" type="submit" value="Send Message" />
											</div>
										<?php echo form_close() ?>
										</div><!-- /.box-form -->
									</div><!-- /.col -->

									<div class="col-md-4">
										<div class="box-alamat">
											<div class="tag-kontak">Contact Information</div>
											<div class="subtag-kontak">Untuk informasi lebih lanjut, silahkan hubungi kami.</div>
											<div class="item-kontak">
												<div class="tag-item-kontak">Alamat</div>
												<div class="isi-item-kontak">
													<?php echo nl2br($contact->contact_address) ?>
												</div>
											</div><!-- /.item-kontak -->
											<div class="item-kontak">
												<div class="tag-item-kontak">Telepon</div>
												<div class="isi-item-kontak"><?php echo $contact->contact_phone ?></div>
											</div><!-- /.item-kontak -->
											<div class="item-kontak">
												<div class="tag-item-kontak">Nomor CS</div>
												<div class="isi-item-kontak"><?php echo $contact->contact_cs ?></div>
											</div><!-- /.item-kontak -->
											<div class="item-kontak">
												<div class="tag-item-kontak">Nomor Whatsapp</div>
												<div class="isi-item-kontak"><?php echo $contact->contact_wa ?></div>
											</div><!-- /.item-kontak -->
											<div class="item-kontak">
												<div class="tag-item-kontak">Email</div>
												<div class="isi-item-kontak"><?php echo $contact->contact_email ?></div>
											</div><!-- /.item-kontak -->
										</div><!-- /.box-alamat -->
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div><!-- /.box-kontak -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->

<div class="peta">
	<div class="peta">
		<?php echo $contact->contact_maps ?>
	</div><!-- /.peta -->
</div><!-- /.peta -->
</div>
