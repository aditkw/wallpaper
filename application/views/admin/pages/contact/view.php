<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Kontak
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dasbor</a></li>
			<li class="active">Kontak</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Alert -->
		<div class="row form-group">
			<!-- Menampilkan hasil kesalahan validasi dalam proses input dan update data -->
			<?php if ($this->session->flashdata('error')):?>
				<div class="col-md-12 wow fadeInDown">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-close"></i> Error!</h4>
						<ul>
							<?php echo $this->session->flashdata('error'); ?>
						</ul>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif;?>

			<!-- Menampilkan hasil sukses dari proses input dan update data -->
			<?php if ($this->session->flashdata('success')): ?>
				<div class="col-md-12 wow fadeInDown">
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						<?php echo $this->session->flashdata('success')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>

			<!-- Menampilkan hasil kesalahan dari proses input dan update data -->
			<?php if ($this->session->flashdata('failed')): ?>
				<div class="col-md-12 wow fadeInDown">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-close"></i> Failed!</h4>
						<?php echo $this->session->flashdata('failed')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>
		</div><!-- /row -->

		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Kontak</a></li>
						<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Alamat</a></li>
						<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Sosial Media</a></li>
						<!-- <li class="pull-right"><button type='submit' class="text-muted btn btn-flat btn-primary"><i class="fa fa-save"></i> Save</button></li> -->
					</ul>

					<div class="tab-content">

						<div class="tab-pane active" id="tab_1">
							<?php echo form_open('admin/contact/update/contact');?>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $contact->contact_id;?>">
								<label for="title">No Telpon</label>
								<input type="text" name="phone" class="form-control" value="<?php echo $contact->contact_phone;?>" placeholder="phone number">
							</div>
							<div class="form-group">
								<label for="title">No CS</label>
								<input type="text" name="cs" class="form-control" value="<?php echo $contact->contact_cs;?>" placeholder="cs phone">
							</div>
							<div class="form-group">
								<label for="title">Nomor WhatsApp</label>
								<input type="text" name="wa" class="form-control" value="<?php echo $contact->contact_wa;?>" placeholder="wa number">
							</div>
							<div class="form-group">
								<label for="title">Email</label>
								<input type="email" name="email" class="form-control" value="<?php echo $contact->contact_email;?>" placeholder="email">
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
								<button type="reset" name="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
							</div>
							<?php echo form_close();?>
						</div><!-- /.tab-pane -->

						<div class="tab-pane" id="tab_2">
							<?php echo form_open('admin/contact/update/address');?>
							<div class="form-group">
								<label for="title">Alamat</label>
								<input type="hidden" name="id" value="<?php echo $contact->contact_id;?>">
								<textarea name="address" class="form-control" placeholder="address" rows="3"><?php echo $contact->contact_address;?></textarea>
							</div>
							<div class="form-group">
								<label for="title">Lokasi Peta <span class="badge bg-yellow" data-toggle="modal" data-target="#helpModal" style="cursor: help;">?</span> </label>
								<textarea name="maps" class="form-control" placeholder="maps location" rows="5"><?php echo $contact->contact_maps;?></textarea>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
								<button type="reset" name="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
							</div>
							<?php echo	form_close();?>
						</div><!-- /.tab-pane -->

						<div class="tab-pane" id="tab_3">
							<?php echo form_open('admin/contact/update/media');?>
							<div class="form-group">
								<label for="title">Facebook</label>
								<input type="hidden" name="id" value="<?php echo $contact->contact_id;?>">
								<input type="text" name="fb" class="form-control" value="<?php echo $contact->contact_fb;?>" placeholder="facebook">
							</div>
							<div class="form-group">
								<label for="title">Twitter</label>
								<input type="text" name="tw" class="form-control" value="<?php echo $contact->contact_tw;?>" placeholder="twitter">
							</div>
							<div class="form-group">
								<label for="title">Youtube</label>
								<input type="text" name="yt" class="form-control" value="<?php echo $contact->contact_yt;?>" placeholder="youtube">
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
								<button type="reset" name="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
							</div>
							<?php echo form_close();?>
						</div><!-- /.tab-pane -->

					</div><!-- /.tab-content -->
				</div><!-- /.nav-tabs-custom -->

			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2 class="modal-title" id="myModalLabel">Update maps location</h2>
			</div>
			<div class="modal-body">
				<h4>1. Menuju ke <a href="http://maps.google.com" target="_blank">http://maps.google.com</a></h4>
				<h4>2. Cari lokasi</h4>
				<img class="img img-responsive" src="<?php echo base_url('dist/img/assets/maps.jpg');?>">
				<h4>3. Pilih menu "Share or embed map"</h4>
				<img class="img img-responsive" src="<?php echo base_url('dist/img/assets/maps-3.jpg');?>">
				<h4>3. Copy and paste bagian yang dilingkari ke kolom lokasi peta .</h4>
				<img class="img img-responsive" src="<?php echo base_url('dist/img/assets/maps-4.jpg');?>">
			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</div>
