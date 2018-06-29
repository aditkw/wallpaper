<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Member Area</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view($side_member) ?>
					</div><!-- /.col -->
					
					<div class="col-md-9">
						<div class="konten-member">
							<div class="tag-konten-member"><strong>Welcome</strong> <?php echo $member->member_name ?></div>
							
							<div class="box-item-sorkat">
								<div class="row">
									<div class="col-sm-6">
										<a class="item-sorkat text-center" href="<?php echo site_url('member-area?menu=profile') ?>">
											<i class="glyphicon glyphicon-user"></i>
											<div class="jud-item-sorkat">Profile</div>
										</a>	
									</div>
									
									<div class="col-sm-6">
										<a class="item-sorkat text-center" href="<?php echo site_url('member-area?menu=transaksi') ?>">
											<i class="glyphicon glyphicon-shopping-cart"></i>
											<div class="jud-item-sorkat">My Orders</div>
										</a>	
									</div>
								</div><!-- /.row -->
							</div><!-- /.box-item-sorkat -->
							
							<div class="tag-konten">
								<div class="nama-tag-konten font-20">UNPAID ORDER</div>
							</div><!-- /.tag-konten -->
							
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-member">
									<thead>
										<th>ID Order</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Total Pembayaran</th>
										<th class="text-center">View</th>
									</thead>
									<tbody>
										<?php if ($count_trans > 0): ?>
											<?php foreach ($transaction as $trans): ?>
												<?php 
												$date = indonesian_date($trans->transaction_date);
 												?>
												<tr>
													<td><?php echo $trans->order_no ?></td>
													<td><?php echo $date['day'].', '.$date['date'] ?></td>
													<td><?php echo rupiah($trans->transaction_total) ?></td>
													<td>
														<a class="btn btn-warning btn-sm" href="<?php echo site_url('member-area/transaksi/'.$trans->order_no) ?>">
														  <i class="fa fa-search"></i>
														</a>
													</td>
												</tr>
											<?php endforeach ?>
										<?php else: ?>
											<tr>
												<td colspan="5">
													<div class="alert alert-danger text-center">Data masih kosong</div>
												</td>
											</tr>
										<?php endif ?>
									</tbody>
								</table>
							</div><!-- /.table-responsive -->
							
							<div class="page text-right">
								<?php // echo $pagination; ?>
							</div><!-- /.page -->
						</div><!-- /.konten-member -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
	