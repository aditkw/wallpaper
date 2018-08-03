<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Brand
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
			<li class="active">Brand</li>
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
				<div class="form-group text-right">
					<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#add" title="Add New"><i class="fa fa-plus"></i> Tambah Data Baru</button>
				</div>
				<table id="datatable1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="15%">Gambar</th>
							<th>Kategori</th>
							<th>Motif</th>
							<th>Nama Brand</th>
							<th>Harga Brand</th>
							<th>Ukuran Brand</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($brand as $brand): ?>
							<tr>
								<td><?php echo $no;?></td>
								 <td>
									 <img src="<?php echo base_url($path_file.'/'.$thumb_pre.$brand->brand_image);?>" class="img img-responsive" alt="">
								</td>
								<td><?php echo $brand->category_name;?></td>
								<td><?php echo $brand->motif_name;?></td>
								<td><?php echo $brand->brand_name;?></td>
								<td><?php echo $brand->brand_price;?></td>
								<td><?php echo $brand->brand_size;?></td>

									<!-- Action -->
									<td>
									<?php if ($brand->brand_pub == '88'): ?>
										<a href="<?php echo site_url('admin/brand/publish/'.$brand->brand_id);?>" class="btn btn-flat btn-danger" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php else: ?>
										<a href="<?php echo site_url('admin/brand/publish/'.$brand->brand_id);?>" class="btn btn-flat btn-success" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php endif ?>
									<a class="btn btn-flat btn-default btn-edit-brand" data-id="<?php echo $brand->brand_id;?>" title="Update">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/brand/delete/'.$brand->brand_id);?>" class="btn btn-warning btn-flat" title="Delete">
									<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="15%">Gambar</th>
							<th>Kategori</th>
							<th>Motif</th>
							<th>Nama Brand</th>
							<th>Harga Brand</th>
							<th>Ukuran Brand</th>
							<th>Aksi</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div id="add" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Brand Baru</h4>
			</div>
			<?php echo form_open_multipart('admin/brand/insert');?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="category">Pilih Kategori</label>
							<select name="category" id="" class="form-control">
								<?php foreach ($category as $cat): ?>
									<option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="category">Pilih Motif</label>
							<select name="motif" id="" class="form-control">
								<?php foreach ($motif as $mot): ?>
									<option value="<?=$mot->motif_id?>"><?=$mot->motif_name?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="brand">Nama Brand</label>
					<input type="text" name="name" class="form-control" placeholder="brand name" required>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Harga Brand</label>
							<input type="number" name="price" class="form-control" placeholder="brand price" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Harga Coret Brand</label>
							<input type="number" name="price_strip" class="form-control" placeholder="brand price strip" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Diskon Brand</label>
							<input type="number" name="discount" class="form-control" placeholder="brand discount" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Ukuran Brand</label>
							<input type="text" name="size" class="form-control" placeholder="brand size" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Berat Brand</label>
							<input type="text" name="weight" class="form-control" placeholder="brand weight" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Tahun Terbit</label>
							<input type="text" name="launch" class="form-control" placeholder="brand launch" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="brand">Gambar</label>
					<input type="file" name="image" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>

<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update brand</h4>
			</div>
			<?php echo form_open_multipart('admin/brand/update');?>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="category">Pilih Kategori</label>
							<select name="category" id="category" class="form-control">
								<?php foreach ($category as $cat): ?>
									<option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="category">Pilih Motif</label>
							<select name="motif" id="motif" class="form-control">
								<?php foreach ($motif as $mot): ?>
									<option value="<?=$mot->motif_id?>"><?=$mot->motif_name?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="brand">Nama Brand</label>
					<input id="id" type="hidden" name="id">
					<input id="name" type="text" name="name" class="form-control" placeholder="brand name" required>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Harga Brand</label>
							<input id="price" type="number" name="price" class="form-control" placeholder="brand price" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Harga Coret Brand</label>
							<input id="price_strip" type="number" name="price_strip" class="form-control" placeholder="brand price strip" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Diskon Brand</label>
							<input id="discount" type="number" name="discount" class="form-control" placeholder="brand discount" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Ukuran Brand</label>
							<input id="size" type="text" name="size" class="form-control" placeholder="brand size" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Berat Brand</label>
							<input id="weight" type="text" name="weight" class="form-control" placeholder="brand weight" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Tahun Terbit</label>
							<input id="launch" type="text" name="launch" class="form-control" placeholder="brand launch" required>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="brand">Gambar</label>
					<input type="file" name="image" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
