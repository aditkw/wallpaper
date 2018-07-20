<div class="dashboard-member">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">MEMBER AREA</a></li>
			</ol>
			<h2 class="ftimes">TRANSAKSI</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-content box-about">
					<div class="row">
						<div class="col-md-3">
							<?php $this->load->view($side_member) ?>
						</div><!-- /.col -->
						<div class="col-md-9">
							<div class="konten-member">
								<?php if ($this->session->flashdata('success')): ?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong><i class="fa fa-check text-success"></i></strong>
										<?php echo $this->session->flashdata('success') ?>
									</div>
								<?php endif ?>
								<div class="tag-konten-member"><strong>My Orders</strong></div>

								<div class="table-responsive">
									<table class="table table-bordered table-striped table-member">
										<thead>
											<th>ID Order</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Total Pembayaran</th>
											<th>Status</th>
											<th class="text-center">View</th>
										</thead>
										<tbody>
											<?php if ($count_trans > 0): ?>
												<?php foreach ($transaction as $trans): ?>
													<?php
													$date = indonesian_date($trans->transaction_date);
													?>
													<tr>
														<td><span class="bold-idorder"><?php echo $trans->order_no ?></span></td>
														<td class="text-center"><?php echo $date['day'].', '.$date['date'] ?></td>
														<td class="text-center"><strong><?php echo rupiah($trans->transaction_total) ?></strong></td>
														<td>
															<?php if ($trans->trans_status_id == 1 && $trans->transaction_cancel == 88): ?>
																<span class='label label-danger'>Status : <?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 2): ?>
																<span class='label label-danger'>Status : <?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 3): ?>
																<span class='label label-warning'>Status : <?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 4): ?>
																<span class='label label-info'>Status : <?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->transaction_cancel == 99): ?>
																<span class='label label-success'>Status : Transaction Canceled</span>
															<?php endif ?>
														</td>
														<td class="text-center">
															<a class="btn btn-warning btn-sm" href="<?php echo site_url('member-area/transaksi/'.$trans->order_no) ?>">
																<i class="fa fa-search"></i>
															</a>
														</td>
													</tr>
												<?php endforeach ?>
											<?php else: ?>
												<tr>
													<td colspan="6">
														<div class="alert alert-danger text-center">Data masih kosong</div>
													</td>
												</tr>
											<?php endif ?>
										</tbody>
									</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.konten-member -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
</div>
