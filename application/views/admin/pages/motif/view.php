<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Motif
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Motif</li>
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
					<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#add" title="Add New"><i class="fa fa-plus"></i> Add New</button>
				</div>
				<table id="datatable1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="5%">#</th>
							<!-- <th width="15%">Image</th> -->
							<th width="80%">Motif Name</th>
							<!-- <th>Description</th> -->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($motif as $motif): ?>
							<tr>
								<td><?php echo $no;?></td>
								<!-- <td> -->
									<!-- <img src="<?php echo base_url($path_file.'/'.$thumb_pre.$motif->motif_image);?>" class="img img-responsive" alt="<?php echo $motif->motif_alt;?>"> -->
								<!-- </td> -->
								<td><?php echo $motif->motif_name;?></td>
								<!-- <td> -->
									<!-- <div class="text-scroll"> -->
										<!-- <?php echo nl2br($motif->motif_desc);?> -->
									<!-- </div> -->
								<!-- </td> -->
								<td>
									<!-- Action -->
									<?php if ($motif->motif_pub == '88'): ?>
										<a href="<?php echo site_url('admin/motif/publish/'.$motif->motif_id);?>" class="btn btn-flat btn-danger" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php else: ?>
										<a href="<?php echo site_url('admin/motif/publish/'.$motif->motif_id);?>" class="btn btn-flat btn-success" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php endif ?>
									<a class="btn btn-flat btn-default btn-edit-motif" data-id="<?php echo $motif->motif_id;?>" title="Update">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/motif/delete/'.$motif->motif_id);?>" class="btn btn-warning btn-flat" title="Delete">
									<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<!-- <th>Image</th> -->
							<th>Motif Name</th>
							<!-- <th>Description</th> -->
							<th>Action</th>
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
				<h4 class="modal-title">Add New motif</h4>
			</div>
			<?php echo form_open_multipart('admin/motif/insert');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="motif">Motif Name</label>
					<input type="text" name="name" class="form-control" placeholder="motif name" required>
				</div>
<!--
				<div class="form-group">
					<label for="motif">Description (max 300 chars)</label>
					<textarea name="desc" class="form-control" placeholder="description" rows="5" maxlength="300" required></textarea>
				</div>
				<div class="form-group">
					<label for="motif">Image Alt</label>
					<input type="text" name="alt" class="form-control" placeholder="motif image alt" required>
				</div>
				<div class="form-group">
					<label for="motif">Image</label>
					<input type="file" name="image" class="form-control">
				</div>
 -->
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
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
				<h4 class="modal-title">Update motif</h4>
			</div>
			<?php echo form_open_multipart('admin/motif/update');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="motif">Motif Name</label>
					<input id="id" type="hidden" name="id">
					<input id="name" type="text" name="name" class="form-control" placeholder="motif name" required>
				</div>
<!--
				<div class="form-group">
					<label for="motif">Review (max 300 chars)</label>
					<textarea id="desc" name="desc" class="form-control" placeholder="description" rows="5" maxlength="300" required></textarea>
				</div>
				<div class="form-group">
					<label for="motif">Image Alt</label>
					<input id="alt" type="text" name="alt" class="form-control" placeholder="motif image alt" required>
				</div>
				<div class="form-group">
					<label for="motif">Image</label>
					<input type="file" name="image" class="form-control">
				</div>
 -->
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
