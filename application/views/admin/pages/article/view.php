<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Artikel
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
			<li class="active">Artikel</li>
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
					<button class="btn btn-primary btn-flat" onclick="window.location.href='<?php echo site_url('admin/article/add');?>'" title="Add New"><i class="fa fa-plus"></i> Tambah Data Baru</button>
				</div>
				<div class="table-responsive">
					<table id="datatable1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="15%">Gambar</th>
								<th>Judul</th>
								<!-- <th width="15%">Category</th> -->
								<th>Tag</th>
								<th width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($article as $article): ?>
								<tr>
									<td><?php echo $no;?></td>
									<td>
										<img src="<?php echo base_url('uploads/img/article/'.$thumb_pre.$article->image_name);?>" class="img img-responsive" alt="<?php echo $article->article_alt;?>">
									</td>
									<td><?php echo ucwords($article->article_title);?></td>
									<!-- <td><?php echo ucwords($article->article_cat_name);?></td> -->
									<td><?php echo $article->article_tag ?></td>
									<td>
										<!-- Action -->
										<?php if ($article->article_pub == '88'): ?>
											<a href="<?php echo site_url('admin/article/publish/'.$article->article_id);?>" class="btn btn-flat btn-danger" title="Publish">
												<i class="fa fa-bullhorn"></i>
											</a>
										<?php else: ?>
											<a href="<?php echo site_url('admin/article/publish/'.$article->article_id);?>" title="Publish">
												<button type="button" disabled class="btn btn-flat btn-success"><i class="fa fa-bullhorn"></i></button>												
											</a>
										<?php endif ?>
										<a class="btn btn-flat btn-default" onclick="window.location.href='<?php echo site_url('admin/article/edit/'.$article->article_id);?>'" title="Update">
											<i class="fa fa-edit"></i>
										</a>
										<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/article/delete/'.$article->article_id);?>" class="btn btn-warning btn-flat" title="Delete">
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
								<th>Judul</th>
								<!-- <th width="15%">Category</th> -->
								<th>Tag</th>
								<th width="15%">Aksi</th>

							</tr>
						</thead>
					</table>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
