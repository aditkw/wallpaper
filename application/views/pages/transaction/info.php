<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Review Pesanan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-content">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="box-review">
								<?php if ($status == FALSE): ?>
									<div class="tag-review text-center">No Transaksi anda tidak ditemukan. <br> Periksa kembali no transaksi anda.</div>
								<?php else: ?>
									<div class="tag-review text-center">Terima Kasih Telah Berbelanja Disini</div>
									<div class="tag-idorder text-center">No. Transaksi <strong><?php echo $trans->order_no ?></strong></div>
									<div class="text-review text-center">Harap mencatat no. order anda untuk mengetahui status pesanan anda</div>
									<div class="text-review text-center alert alert-warning">Status : <?php echo ucwords($trans->trans_status_name) ?></div>
									<?php if ($trans->trans_status_id > 2): ?>
										<div class="text-review text-center alert alert-warning">
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
														<img src="<?php echo site_url('/uploads/img/product/thumb-'.$item->image_name) ?>" alt="<?php echo $item->product_alt ?>" width="100%">
													</td>
													<td class="vmiddle">
														<div class="review-nama"><?php echo $item->product_name ?></div>
														<div class="review-harga"><?php echo rupiah($item->transaction_item_price) ?></div>
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
										<li>Total Bayar <strong class="pull-right"><?php echo rupiah($trans->transaction_total) ?></strong></li>
									</ul>
									
									<div class="tag-review text-center">Metode Pembayaran</div>
									
									<!-- Custom Tabs -->
									<div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1" data-toggle="tab">Credit Card</a></li>
											<li><a href="#tab_2" data-toggle="tab">Transfer Bank</a></li>
										</ul>
										
										<div class="tab-content box-tab">
											<div class="tab-pane active" id="tab_1">
												<div class="tag-review-info">Dalam uji coba > Credit card and online banking :</div>
												<div class="box-logo-bank">
													<div class="row">
														<img src="<?php echo base_url('dist/img/bank/visa.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/master.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/paypal.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/bca.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/anz.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/bii.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/danamon.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/common.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/niaga.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/bukopin.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/mandiri.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/mega.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/muamalat.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/bni.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/ocbc.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/uob.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/sinarmas.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/bri.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/permata.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
														<img src="<?php echo base_url('dist/img/bank/panin.jpg') ?>" class="col-md-2 col-sm-3 col-xs-4">
													</div><!-- row -->
													
													<div class="free-text text-center">Anda ingin melakukan pembayaran atas transaksi ini?</div>
													<div class="text-center">
														<a class="btn btn-info btn-credit" data-toggle="modal" data-target="#modal-kredit">Bayar dengan Kartu Kredit</a>
													</div>
												</div>
											</div><!-- /.tab-pane -->
											
											<div class="tab-pane" id="tab_2">
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
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.box-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->

<?php if(isset($order_no)) :?>
	<div class="modal fade" id="modal-kredit">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php echo form_open() ?>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="fa fa-credit-card"></i> Pembayaran Menggunakan Credit Card</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>No. Transaksi</label>
							<input type="text" value="<?php echo $order_no ?>" class="form-control" disabled>
							</div>
							<div class="form-group">
							<label>Subtotal</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" value="<?php echo uang($trans->transaction_cost) ?>" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label>Shipping</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" value="<?php echo uang($trans->transaction_shipping_cost) ?>" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label>Additional Charge CC <b>(3%)</b></label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" value="<?php echo uang($addc) ?>" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label>Total yang harus dibayar</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" value="<?php echo uang($total_addc)?>" class="form-control" disabled>
							</div>
						</div>
					</div><!-- /.modal-body -->
					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-warning">Continue</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div><!-- /.modal -->
<?php endif ?>
