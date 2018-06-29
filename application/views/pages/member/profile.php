<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Profile</li>
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
						<div class="col-md-3">
							<?php $this->load->view($side_member) ?>
						</div><!-- /.col -->
						<div class="col-md-9">
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
							<div class="konten-member">
								<div class="tag-konten">
									<div class="nama-tag-konten font-20">MY PROFILE</div>
								</div><!-- /.tag-konten -->
								
								<div class="box-profil">
									<?php echo form_open(); ?>
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
												<div class="col-sm-8">
													<input class="form-control" type="text" name="nama" value="<?php echo $member->member_name ?>" placeholder="Nama Lengkap" required	>
												</div>
											</div>
										</div><!-- form-group -->
																				
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">No. Telp / Hp <span class="required">*</span></label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="telp" value="<?php echo $member->member_phone ?>" required>
												</div>
											</div>
										</div><!-- form-group -->
										
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Email</label>
												<div class="col-sm-6">
													<input class="form-control" value="<?php echo $member->member_email ?>" disabled>
												</div>
											</div>
										</div><!-- form-group -->

										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Provinsi <span class="required">*</span></label>
												<div class="col-sm-6">
													<select id="province" name="prov" class="form-control" required>
														<option disabled selected>Pilih Provinsi</option>
														<?php foreach ($province as $province): ?>
															<option value="<?php echo $province->province_id.':'.$province->province_name ?>" <?php if ($province->province_id == $member->province_id): ?> selected <?php endif ?>>
																<?php echo $province->province_name; ?>
															</option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
										</div><!-- form-group -->

										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Kota / Kabupaten <span class="required">*</span></label>
												<div class="col-sm-6">
													<select id="city" name="city" class="form-control" required>
														<?php if (empty($member->city_id)): ?>
															<option disabled selected>Pilih Kota / Kabupaten</option>
														<?php else: ?>
															<?php foreach ($member_city as $city): ?>
																<option value="<?php echo $city->city_id.':'.$city->city_name ?>" <?php if ($member->city_id == $city->city_id): ?> selected <?php endif ?>>
																	<?php echo $city->city_name ?>
																</option>
															<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
											</div>
										</div><!-- form-group -->

										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Kecamatan <span class="required">*</span></label>
												<div class="col-sm-6">
													<select id="district" name="district" class="form-control" required>
														<?php if (empty($member->district_id)): ?>
															<option disabled selected>Pilih Kecamatan</option>
														<?php else: ?>
															<?php foreach ($member_district['rajaongkir']['results'] as $district): ?>
																<option value="<?php echo $district['subdistrict_id'].':'.$district['subdistrict_name'] ?>" <?php if ($member->district_id == $district['subdistrict_id']): ?> selected <?php endif ?>>
																	<?php echo $district['subdistrict_name'] ?>
																</option>
															<?php endforeach ?>
														<?php endif ?>
													</select>
												</div>
											</div>
										</div><!-- form-group -->

										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Alamat Lengkap <span class="required">*</span></label>
												<div class="col-sm-9">
													<textarea class="form-control" name="alamat" required><?php echo $member->member_address ?></textarea>
												</div>
											</div>
										</div><!-- form-group -->
										
										<div class="form-group"></div>
										
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Password Lama</label>
												<div class="col-sm-6">
													<input class="form-control" type="password" name="password">
												</div>
											</div>
										</div><!-- form-group -->
										
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">New Password</label>
												<div class="col-sm-6">
													<input class="form-control" type="password" name="pass1">
												</div>
											</div>
										</div><!-- form-group -->
										
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label">Confirm New Password</label>
												<div class="col-sm-6">
													<input class="form-control" type="password" name="pass2">
												</div>
											</div>
										</div><!-- form-group -->
										
										<div class="form-group">
											<div class="row">
												<label class="col-sm-3 control-label"></label>
												<div class="col-sm-6">
													<button class="btn btn-success" type="submit" name="update" value="update">Update</button>
												</div>
											</div>
										</div><!-- form-group -->
									<?php echo form_close(); ?>
								</div><!-- /.box-profil -->
							</div><!-- /.konten-member -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
	