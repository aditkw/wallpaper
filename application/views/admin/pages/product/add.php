<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Produk
			<small>tambah data baru</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
			<li><a href="<?php echo site_url('admin/product');?>">Produk</a></li>
			<li class="active">Tambah Baru</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<?php echo form_open_multipart('admin/product/insert');?>
				<div class="row">
					<div class="col-md-3 col-lg-3">
						<div class="form-group">
							<label for="product">Gambar Index</label>
							<input type="file" name="image[]" class="form-control img-preview" required>
							<img src="<?php echo base_url('dist/img/assets/no-image-1.jpg');?>" class="preview-image img img-responsive" alt="image index">
						</div>
					</div>
					<div class="col-md-9 col-lg-9">
						<div class="row">
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Kode</label>
									<input type="text" name="code" class="form-control" value="" placeholder="product code" required>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Kategori</label>
									<select id="category" name="category" class="form-control" required>
										<option disabled selected>Pilih Kategori</option>
										<?php foreach ($category as $category): ?>
											<option value="<?php echo $category->category_id;?>">
												<?php echo ucwords($category->category_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Brand</label>
									<select id="brand" name="brand" class="form-control" required>
										<option disabled selected>Pilih Kategori Dulu</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-2 col-md-8 col-lg-8">
								<div class="form-group">
									<label for="product">Warna</label>
									<select id="color" name="color" class="form-control" required>
										<option disabled selected>Pilih Warna</option>
										<?php foreach ($color as $color): ?>
											<option value="<?php echo $color->color_id;?>">
												<?php echo ucwords($color->color_name);?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<!-- <div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Motif</label>
									<select id="motif" name="motif" class="form-control" required>
										<option disabled selected>Select Motif</option>
									</select>
								</div>
							</div> -->
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="product">Nama Produk</label>
									<input type="text" name="name" class="form-control" value="" placeholder="product name" required>
								</div>
							</div>
							<!-- <div class="col-md-4 col-lg-4">
								<div class="form-group">
									<label for="product">Sub Category</label>
									<select id="subcat" name="subcat" class="form-control" required>
											<option disabled selected>Select Sub Category</option>
									</select>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Harga</label>
							<input type="number" name="price" class="form-control" value="" placeholder="product price" required>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Harga Coret</label>
							<input type="number" name="strip" class="form-control" value="" placeholder="product price strip">
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Diskon(%)</label>
							<input type="number" name="discount" class="form-control" value="" placeholder="product discount">
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Berat (kg)</label>
							<input type="number" name="weight" class="form-control" value="" placeholder="product weight" required>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<label for="product">Ukuran (Lebar x Tinggi) (cm)</label>
						<div class="row">
							<!-- <div class="col-md-4 col-lg-4">
								<div class="form-group">
									<input type="number" name="length" class="form-control" value="" placeholder="lenght" required>
								</div>
							</div> -->
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<input type="number" name="width" class="form-control" value="" placeholder="width" required>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<input type="number" name="height" class="form-control" value="" placeholder="height" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Stok</label>
							<input type="number" name="stock" class="form-control" value="" placeholder="product stock" required>
						</div>
					</div>
				</div>
				<hr>
				<!-- <div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label for="product">Description</label>
							<textarea name="desc" class="ckeditor"></textarea>
						</div>
					</div>
				</div>
				<hr> -->
				<div class="row">
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Gambar Banner (utk di halaman brand)</label>
							<input type="file" name="image[]" class="form-control img-preview" required>
							<img src="<?php echo base_url('dist/img/assets/no-image-1.jpg');?>" class="preview-image img img-responsive" alt="image index">
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Alt Gambar</label>
							<input type="text" name="alt" class="form-control" value="" placeholder="image alt" required>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<label for="product">Product Page</label>
							<input type="number" name="page" class="form-control" value="" placeholder="halaman" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<div class="callout callout-warning">
								<h4><i class="fa fa-warning"></i></h4>
								<p>Gambar index dan gambar banner diatas wajib diisi </p>
							</div>
						</div>
					</div>
					<?php for ($i=1; $i < 6; $i++):?>
						<div class="<?php echo ($i==1) ? 'col-md-offset-1 ' : '';?>col-md-2 col-lg-2">
							<div class="form-group">
								<label for="product">Gambar </label>
								<input type="file" name="image[]" class="form-control img-preview" required>
								<img src="<?php echo base_url('dist/img/assets/no-image-1.jpg');?>" class="preview-image img img-responsive" alt="image index">
							</div>
						</div>
					<?php endfor ?>
				</div>
				<hr>
				<div class="form-group">
					<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
				</div>
				<?php echo form_close();?>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
