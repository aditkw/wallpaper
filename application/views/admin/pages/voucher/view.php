<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Voucher
			<small>data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Voucher</li>
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
							<th>Voucher Code</th>
							<th>Voucher Discount</th>
						  <th>Voucher Limit</th>
						  <th>Voucher Expired</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($voucher as $voucher): ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $voucher->voucher_code;?></td>
								<td><?php echo rupiah($voucher->voucher_discount);?></td>
								<td><?php echo $voucher->voucher_limit;?></td>
								<td><?php echo $voucher->voucher_expired;?></td>
								<td>
									<!-- Action -->
									<?php if ($voucher->voucher_pub == '88'): ?>
										<a href="<?php echo site_url('admin/voucher/publish/'.$voucher->voucher_id);?>" class="btn btn-flat btn-danger" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php else: ?>
										<a href="<?php echo site_url('admin/voucher/publish/'.$voucher->voucher_id);?>" class="btn btn-flat btn-success" title="Publish">
											<i class="fa fa-bullhorn"></i>
										</a>
									<?php endif ?>
									<a class="btn btn-flat btn-default btn-edit-voucher" data-id="<?php echo $voucher->voucher_id;?>" title="Update">
										<i class="fa fa-edit"></i>
									</a>
									<a onclick="return confirm('Are you sure ?')"  href="<?php echo site_url('admin/voucher/delete/'.$voucher->voucher_id);?>" class="btn btn-warning btn-flat" title="Delete">
									<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Voucher Code</th>
							<th>Voucher Discount</th>
							<th>Voucher Limit</th>
							<th>Voucher Expired</th>
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
				<h4 class="modal-title">Add New Voucher</h4>
			</div>
			<?php echo form_open_multipart('admin/voucher/insert');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="voucher">Voucher Code</label>
					<input type="text" name="code" class="form-control" placeholder="voucher code" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Discount</label>
					<input type="number" name="discount" class="form-control" placeholder="voucher discount" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Limit</label>
					<input type="number" name="limit" class="form-control" placeholder="voucher limit" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Expired</label>
					<input type="date" name="expired" class="form-control" required>
				</div>
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
				<h4 class="modal-title">Update voucher</h4>
			</div>
			<?php echo form_open_multipart('admin/voucher/update');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="voucher">Voucher Code</label>
					<input id="id" type="hidden" name="id">
					<input id="code" type="text" name="code" class="form-control" placeholder="voucher code" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Discount</label>
					<input id="discount" type="number" name="discount" class="form-control" placeholder="voucher discount" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Limit</label>
					<input id="limit" type="number" name="limit" class="form-control" placeholder="voucher limit" required>
				</div>
				<div class="form-group">
					<label for="voucher">Voucher Expired</label>
					<input id="expired" type="date" name="expired" class="form-control" placeholder="voucher expired" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
