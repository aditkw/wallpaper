<div class="yuorder">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">REVIEW PESANAN</a></li>
			</ol>
			<h2 class="ftimes">REVIEW PESANAN</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>

	<div id="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="box-content">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="panel panel-default">
									<div class="panel-heading">
										Review Order
									</div>
									<div class="panel-body">
										<div class="box-review">
											<?php if ($status == FALSE): ?>
												<div class="tag-review text-center">No Transaksi anda tidak ditemukan. <br> Periksa kembali no transaksi anda.</div>
											<?php else: ?>
												<div class="tag-review text-center">Terima Kasih Telah Berbelanja Disini</div>
												<div class="tag-idorder text-center">No. Transaksi <strong><?php echo $trans->order_no ?></strong></div>
												<div class="text-review text-center">Harap mencatat no. order anda untuk mengetahui status pesanan anda</div>
												<div class="text-review text-center alert alert-info">Status : <?php echo ucwords($trans->trans_status_name) ?></div>
												<?php if ($trans->trans_status_id > 2): ?>
													<div class="text-review text-center alert alert-info">
														<?php if (empty($trans->transaction_shipping_no)): ?>
															<strong>No Resi</strong> On Process
														<?php else: ?>
															<?php $date_shipment = indonesian_date($trans->transaction_shipping_date) ?>
															<strong>No Resi</strong> <?php echo $trans->transaction_shipping_no ?><br>
															<strong>Tanggal Kirim</strong> <?php echo $date_shipment['date']?>
														<?php endif ?>
													</div>
												<?php endif ?>
												<table class="table table-review">
													<thead>
														<tr>
															<th class="text-center" colspan="4">Item Pesanan Anda</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($trans_item as $item): ?>
															<tr>
																<td width="100">
																	<img class="max-width" src="<?php echo site_url('/uploads/img/product/'.$item->image_name) ?>" alt="<?php echo $item->product_alt ?>" width="100%">
																</td>
																<td class="vmiddle">
																	<div class="review-nama"><?php echo $item->product_name ?></div>
																	<div class="review-harga"><?php echo rupiah($item->transaction_item_price_disc) ?></div>
																</td>
																<td class="text-center vmiddle"><?php echo $item->transaction_item_qty ?></td>
																<td class="text-center vmiddle"><strong><?php echo rupiah($item->transaction_item_subtotal) ?></strong></td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>

												<ul class="list-review">
													<li>Total Belanja <strong class="pull-right"><?php echo rupiah($trans->transaction_cost) ?></strong></li>
													<li>Ongkos Kirim <strong class="pull-right"><?php echo rupiah($trans->transaction_shipping_cost) ?></strong></li>

													<?php if ($trans->voucher_discount): ?>
													<li>Diskon Voucher <strong class="pull-right"><?php echo rupiah($trans->voucher_discount) ?></strong></li>
													<?php endif; ?>

													<li>Total Bayar <strong class="pull-right"><?php echo rupiah($trans->transaction_total) ?></strong></li>
												</ul>

												<div class="tag-review text-center">Metode Pembayaran</div>

												<!-- Custom Tabs -->
												<div class="nav-tabs-custom">
													<ul class="nav nav-tabs">
														<!-- <li class="active"><a href="#tab_1" data-toggle="tab">Credit Card</a></li> -->
														<li class="active"><a href="#tab_2" data-toggle="tab">Transfer Bank</a></li>
													</ul>

													<div class="tab-content box-tab">
														<div class="tab-pane active" id="tab_2">
															<div class="tag-review-info">Silahkan Lakukan Pembayaran ke Rekening di bawah ini :</div>
															<ul class="list-bank list-unstyled">
																<?php foreach ($bank as $bank): ?>
																	<li>
																		<i class="fa fa-check text-success"></i>
																		<?php echo $bank->bank_name ?> No. Rek. <?php echo $bank->bank_no ?> A/N <?php echo $bank->bank_account ?>
																	</li>
																<?php endforeach ?>
															</ul>

															<div class="text-review-info">
																Mohon lakukan konfirmasi kepada kami jika anda sudah melakukan pembayaran, agar kami bisa melakukan pengecekan. Apabila dalam waktu 1x24 jam belum melakukan pembayaran sejak waktu waktu transaksi, maka otomatis transaksi anda dibatalkan. Konfirmasi bisa dilakukan via telp, sms, atau via <a href="<?php echo site_url('konfirmasi-pembayaran?order='.$trans->order_no) ?>">Konfirmasi Pembayaran</a> pada website. Kami hanya akan memproses pesanan ke tahap pengiriman apabila sudah ada pembayaran dari anda. Terima Kasih
															</div><!-- /.text-review-info -->
														</div><!-- /.tab-pane -->
													</div><!-- /.tab-content -->
												</div><!-- nav-tabs-custom -->
											<?php endif ?>
										</div><!-- /.box-review -->
									</div>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.box-content -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#koneten-home -->
</div>
