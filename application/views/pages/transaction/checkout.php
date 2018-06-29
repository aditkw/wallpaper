<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Informasi Pengiriman</li>
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
					<h2 class="tag-page">Informasi Pengiriman</h2>
					<div class="box-cart">
						<form class="form-horizontal" name="form-pengiriman" action="<?php echo site_url() ?>pilih-pengiriman" method="post">
							
							<div class="form-group">
								<label class="col-md-3  control-label">Nama Lengkap <span class="required">*</span></label>
								<div class="col-md-6">
									<input class="form-control" type="text" name="nama" value="<?php if (!empty($member_sesion)) echo $member->member_name; ?>" placeholder="Nama Depan" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Telepon / Hp <span class="required">*</span></label>
								<div class="col-md-3">
									<input class="form-control" type="text" name="telp" value="<?php if (!empty($member_sesion)) echo $member->member_phone ?>" placeholder="Nomor Telepon / Hp" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Email <span class="required">*</span></label>
								<div class="col-md-4">
									<input class="form-control" type="email" name="email" value="<?php if (!empty($member_sesion)) echo $member->member_email ?>" placeholder="Alamat Email" required>
								</div>
							</div>
							
							<div class="form-group"></div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Alamat Lengkap <span class="required">*</span></label>
								<div class="col-md-6">
									<textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" required><?php if (!empty($member_sesion)) echo $member->member_address ?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Provinsi <span class="required">*</span></label>
								<div class="col-md-3">
									<select id="province" class="form-control" name="province" required>
										<option selected disabled>Pilih Provinsi</option>
										<?php foreach ($province as $province): ?>
											<option value="<?php echo $province->province_id.':'.$province->province_name ?>" <?php if (!empty($member_sesion)) if ($province->province_id == $member->province_id) echo "selected" ?>><?php echo $province->province_name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Kota <span class="required">*</span></label>
								<div class="col-md-3">
									<select class="form-control" id="city" name="city" required>
										<option selected disabled>Pilih Kota / Kabupaten</option>
										<?php foreach ($member_city as $city): ?>
											<option value="<?php echo $city->city_id.':'.$city->city_name ?>" <?php if ($city->city_id == $member->city_id) echo "selected" ?>><?php echo $city->city_name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Kecamatan <span class="required">*</span></label>
								<div class="col-md-3">
										<select id="district" name="district" class="form-control" required>
											<?php if (empty($member->district_id)): ?>
												<option disabled selected>Pilih Kecamatan</option>
											<?php else: ?>
												<?php foreach ($member_district['rajaongkir']['results'] as $district): ?>
													<option value="<?php echo $district['subdistrict_id'].':'.$district['subdistrict_name'] ?>" <?php if ($member->district_id == $district['subdistrict_id']) echo "selected" ;?>>
														<?php echo $district['subdistrict_name'] ?>
													</option>
												<?php endforeach ?>
											<?php endif ?>
										</select>
								</div>
							</div>
							
							<div class="form-group"></div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Catatan anda</label>
								<div class="col-md-6">
									<textarea class="form-control" name="catatan" placeholder="Tambahkan catatan anda"></textarea>
								</div>
							</div>
							
							<!-- <div class="form-group"></div>

							<hr>

							<div class="form-group">
								<label class="col-md-3  control-label">Paket pengiriman <span class="required">*</span></label>
								<div class="col-md-6">
									<select id="shipment" name="shipment" class="form-control">
										<option disabled selected>Pilih Paket Pengiriman</option>
										<?php foreach ($cost['rajaongkir']['results'] as $res): ?>
											<optgroup label="<?php echo strtoupper($res['code']) ?>">
												<?php foreach ($res['costs'] as $cont): ?>
													<?php foreach ($cont['cost'] as $value): ?>

														<?php if (array_search($cont['service'], $service)): ?>
															<option value="<?php echo $res['code'].':'.$cont['service'].':'.rupiah($value['value']) ?>">
																<?php echo $cont['service'].' - '.$cont['description'].' - '.rupiah($value['value']) ?>
															</option>
														<?php endif ?>

													<?php endforeach ?>
												<?php endforeach ?>
											</optgroup>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="form-group"></div>

							<hr>

							<div class="form-group">
								<label class="col-md-6 text-right control-label">Total Belanja </label>
								<label id="subTotal" class="col-md-3 control-label"><?php echo rupiah($total_sub) ?> </label>
							</div>

							<div class="form-group">
								<label class="col-md-6 text-right control-label">Biaya Kirim </label>
								<label id="shipCost" class="col-md-3 control-label">On Process</label>
							</div>
							<hr>
							<div class="form-group">
								<label class="col-md-6 text-right control-label">Jumlah  </label>
								<label id="total" class="col-md-3 control-label"><?php echo rupiah($total_sub) ?> </label>
							</div>

							<div class="form-group"></div> -->

							<hr>
							<div class="form-group">
								<label class="col-md-6"></label>
								<div class="col-md-3 text-right">
									<button class="btn btn-success btn-checkout text-uppercase" type="submit" name="kirim">Continue</button>
								</div>
							</div>
						</form>
					</div><!-- /.box-cart -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
	