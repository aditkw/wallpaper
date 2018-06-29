<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Keranjang Belanja</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-keranjang">
					<?php echo form_open('keranjang/update'); ?>
						<div class="table-responsive">
							<?php if ($cart_count > 0): ?>
								<table class="table tbl-keranjang">
									<thead>
										<tr>
											<th class="text-center" colspan="2">Item Produk</th>
											<th class="text-center">Harga</th>
											<th class="text-center" width="120">Jumlah</th>
											<th class="text-center">Subtotal</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($order as $order): ?>
											<?php $product_id = hash_link_encode($this->encrypt->encode($order->product_id)); ?> 
											<tr>
												<td class="text-center" width="130">
													<img src="<?php echo site_url('uploads/img/product/thumb-'.$order->image_name) ?>" width="100%">
												</td>
												<td class="vmiddle">
													<a href="<?php echo site_url('produk/detail/'.$order->product_code.'/'.$order->product_link); ?>"><?php echo $order->product_name ?></a>
												</td>
												<td class="text-center vmiddle"><?php echo rupiah($order->order_price) ?></td>
												<td class="text-center vmiddle">
													<input type="hidden" name="id[]" value="<?php echo $product_id ?>">
													<div class="input-group input-group-sm">
														<input type="number" class="form-control text-center" name="qty[]" min="1" max="<?php echo $order->product_stock ?>" value="<?php echo $order->order_qty ?>">
													</div><!-- /input-group -->
												</td>
												<td class="text-center vmiddle"><strong><?php echo rupiah($order->order_subtotal) ?></strong></td>
												<td class="text-center vmiddle">
													<a class="btn btn-danger" href="<?php echo site_url('keranjang/cancel/'.$product_id) ?>" onClick="return hapus()">
														<i class="fa fa-times"></i>
													</a>
												</td>
											</tr>
										<?php endforeach ?>
											<!-- <tr>
												<td colspan="3" align="right">
													<strong>
														Paket pengiriman
													</strong>
												</td>		
												<td colspan="3">
													<select id="shipment" name="shipment" class="form-control">
														<option disabled selected>Pilih Paket Pengiriman</option>

														<?php foreach ($cost['rajaongkir']['results'] as $res): ?>
															<optgroup label="<?php echo strtoupper($res['code']) ?>">

																<?php foreach ($res['costs'] as $cont): ?>

																	<?php foreach ($cont['cost'] as $value): ?>

																		<?php if (array_search($cont['service'], $service)): ?>
																			<option value="<?php echo $res['code'].':'.$cont['service'] ?>">
																				<?php echo $cont['service'].' - '.$cont['description'].' - '.rupiah($value['value']) ?>
																			</option>
																		<?php endif ?>

																	<?php endforeach ?>

																<?php endforeach ?>

															</optgroup>
														<?php endforeach ?>

													</select>
												</td>
											</tr> -->
									</tbody>
								</table>
							<?php else: ?>
								<div class="alert alert-info">
									<h4>Keranjang anda masih kosong.</h4>
								</div>
							<?php endif ?>	
								
						</div><!-- /.table-responsive -->
						
						<div class="detail-bayar">
							<?php if ($cart_count > 0): ?>
								<table>
									<tr>
										<td class="text-right">Total Belanja</td>
										<td class="text-right" width="150"><strong><?php echo rupiah($total_sub) ?></strong></td>
									</tr>
									<!-- <tr>
										<td class="text-right">Ongkos Kirim</td>
											<td class="text-right"><strong id="on_process">On Process</strong></td>
									</tr>
									<tr>
										<td class="text-right" style="padding-bottom:15px !important;">Total Pembayaran</td>
										<td class="text-right" style="padding-bottom:15px !important;"><strong><?php echo rupiah($total_sub) ?></strong></td>
									</tr> -->
									<tr>
										<th class="text-right" colspan="2">									
											<button class="btn btn-primary btn-checkout text-uppercase" type="submit" name="update">Update Cart</button>
											<a class="btn btn-success btn-checkout text-uppercase" href="<?php echo site_url('keranjang-checkout') ?>">Checkout</a>
										</th>
									</tr>
								</table>
							<?php endif ?>
						</div><!-- /.detail-barang -->
					<?php echo form_close(); ?>
				</div><!-- /.box-keranjang -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#koneten-home -->

<div class="modal fade modal-lwd" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
		<form name="forhubagen" action="proses/do_testimoni.php?act=ins" method="post" enctype="multipart/form-data">
			<input type="hidden" name="urel" value="<?php echo site_url() ?>">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
			  <h4 class="modal-title" id="myModalLabel">Insert Testimoni</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input class="form-control" type="text" name="nama" required />
				</div>
				<div class="form-group">
					<label>Isi Testimoni</label>
					<textarea class="form-control" name="isi" required></textarea>
				</div>
			</div><!-- /.modal-body -->
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
		</div>
	</div>
</div><!-- /.modal -->
	