<div class="dashboard-member">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">MEMBER AREA</a></li>
			</ol>
			<h2 class="ftimes">DETAIL TRANSAKSI</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>

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
							<div class="konten-member">
								<div class="box-invoice">
									<div class="tag-konten-member">
										<strong>Order</strong> <?php echo $trans->order_no ?>
										<div class="pull-right">

											<?php if ($trans->trans_status_id == 1 && $trans->transaction_cancel == 88): ?>
												<button type="button" class="btn btn-info btn-sm" onclick="window.location.href='<?php echo site_url('konfirmasi-pembayaran?order='.$trans->order_no) ?>'">
													Konfirmasi transaksi ini?
												</button>

											<?php elseif ($trans->trans_status_id == 3): ?>
												<button type="button" class="btn btn-info btn-sm" data-toggle="modal" href='#approve'>Sudah menerima pesanan?</button>
											<?php elseif ($trans->trans_status_id == 4 && !$trans->testi_id): ?>
												<button type="button" class="btn btn-info btn-sm" data-toggle="modal" href='#testi'>Ingin memberi testimoni?</button>
											<?php endif ?>

										</div>
									</div><!-- /.tag-konten-member -->

									<div class="head-invoice">
										<div class="row">
											<div class="col-md-8 col-sm-8">
												<table class="table table-condensed tabel-invoice-member">
													<tr>
														<th width="70">Name</th>
														<td class="text-center" width="10">:</td>
														<td><?php echo $trans->transaction_name ?></td>
													</tr>
													<tr>
														<th>Phone</th>
														<td>:</td>
														<td><?php echo $trans->transaction_phone ?></td>
													</tr>
													<tr>
														<th>Email</th>
														<td>:</td>
														<td><?php echo $trans->transaction_email ?></td>
													</tr>
													<tr>
														<th>Address</th>
														<td>:</td>
														<td>
															<?php echo $trans->transaction_address ?>,
															Kec. <?php echo $district ?>,
															<?php echo $city->city_name ?> <br>
															<?php echo $province->province_name ?>
														</td>
													</tr>
												</table>
											</div><!-- /.col -->

											<div class="col-md-4 col-sm-4">
												<table class="table table-condensed tabel-invoice-member">
													<tr>
														<th width="120">Order ID</th>
														<td class="text-center" width="10">:</td>
														<td><strong class="text-danger"><?php echo $trans->order_no ?></strong></td>
													</tr>
													<tr>
														<th>Order Date</th>
														<td>:</td>
														<td>
															<?php
															$date = indonesian_date($trans->transaction_date);
															echo $date['day'].', '.$date['date'];
															?>
														</td>
													</tr>
													<tr>
														<th>Status</th>
														<td>:</td>
														<td>
															<?php if ($trans->trans_status_id == 1 && $trans->transaction_cancel == 88): ?>
																<span class='label label-danger'><?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 2): ?>
																<span class='label label-danger'><?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 3): ?>
																<span class='label label-warning'><?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->trans_status_id == 4): ?>
																<span class='label label-info'><?php echo $trans->trans_status_name ?></span>
															<?php elseif ($trans->transaction_cancel == 99): ?>
																<span class='label label-success'>Transaction Canceled</span>
															<?php endif ?>
														</td>
													</tr>
													<?php if ($trans->trans_status_id > 2): ?>
														<tr>
															<th>Resi</th>
															<td>:</td>
															<td>
																<?php if (empty($trans->transaction_shipping_no)): ?>
																	On Process
																<?php else: ?>
																	<?php echo $trans->transaction_shipping_no ?>
																<?php endif ?>
															</td>
														</tr>
													<?php endif ?>
													<?php if ($trans->trans_status_id == 4): ?>
														<tr>
															<th>Receive</th>
															<td>:</td>
															<td>
																<?php $date_receive = indonesian_date($trans->transaction_receive_date) ?>
																<?php echo $date_receive['day'].', '.$date_receive['date'] ?>
															</td>
														</tr>
													<?php endif ?>
												</table>
											</div><!-- /.col -->
										</div><!-- /.row -->
									</div><!-- /.head-invoice -->

									<div class="body-invoice">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Item Produk</th>
													<th class="text-center">Jumlah</th>
													<th class="text-center">Harga</th>
													<th class="text-center">Harga Diskon</th>
													<th  class="text-center">Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($trans_item as $item): ?>
													<tr>
														<td><?php echo $item->product_name ?></td>
														<td class="text-center"><?php echo $item->transaction_item_qty ?></td>
														<td class="text-center"><?php echo $item->transaction_item_price ?></td>
														<td class="text-center"><?php echo $item->transaction_item_price_disc." ($item->product_discount%)" ?></td>
														<td class="text-right"><strong><?php echo rupiah($item->transaction_item_subtotal) ?></strong></td>
													</tr>
												<?php endforeach ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="3" rowspan="5">
													</td>
												</tr>
												<tr>
													<th class="text-right">Total Belanja</th>
													<th class="text-right"><?php echo rupiah($trans->transaction_cost) ?></th>
												</tr>
												<tr>
													<th class="text-right">Ongkos Kirim</th>
													<th class="text-right"><?php echo rupiah($trans->transaction_shipping_cost) ?></th>
												</tr>
												<?php if ($trans->voucher_discount): ?>
												<tr>
													<th class="text-right">Voucher Discount (<?=$trans->voucher_code?>)</th>
													<th class="text-right"><?php echo rupiah($trans->voucher_discount) ?></th>
												</tr>
												<?php endif; ?>
												<tr>
													<th class="text-right">Total bayar</th>
													<th class="text-right"><?php echo rupiah($trans->transaction_total) ?></th>
												</tr>
											</tfoot>
										</table>

										<div class="note-pembeli">
											<strong>Catatan Pembeli :</strong> <?php echo $trans->transaction_note ?>
										</div>
									</div><!-- /.body-invoice -->
								</div><!-- /.box-invoice -->
							</div><!-- /.konten-member -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->
</div>

<?php if ($trans->trans_status_id == 3): ?>
	<div class="modal fade" id="approve">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Adakah masukan untuk kami?</h4>
				</div>
				<div class="modal-body">
					<?php echo form_open('transaksi/approve/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->transaction_id))) ?>
						<div class="form-group">
							<textarea name="note" class="form-control" placeholder="beri masukan anda disini"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
<?php elseif($trans->trans_status_id == 4 && !$trans->testi_id): ?>
	<div class="modal fade" id="testi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Testimoni dari anda sangat berarti untuk kami</h4>
				</div>
				<div class="modal-body">
					<?php echo form_open('transaksi/testi/'.hash_link_encode($this->encrypt->encode($trans->transaction_id))) ?>
						<div class="form-group">
							<label for="testimoni">Nama Anda</label>
							<input class="form-control" type="text" name="name" value="<?=$this->session->userdata('member_name')?>">
						</div>
						<div class="form-group">
							<label for="testimoni">Testimoni</label>
							<textarea name="desc" class="form-control" placeholder="beri testimoni anda disini"></textarea>
						</div>
						<div class="form-group">
							<label for="testimoni">Pekerjaan Anda</label>
							<input class="form-control" type="text" name="job" value="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Kirim</button>
						</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
