<div class="shipment">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">METODE PENGIRIRMAN</a></li>
			</ol>
			<h2 class="ftimes">METODE PENGIRIRMAN</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>

	<div id="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="box-content box-about">
						<div class="box-login">
							<div class="tag-konten">
								<div class="nama-tag-konten font-20">PILIH METODE PENGIRIMAN</div>
							</div><!-- /.tag-konten -->

							<div class="detail-alamat">
								<table>
									<tr>
										<th><strong>Pengiriman ke </strong></th>
									</tr>
									<tr>
										<td><strong>Alamat	</strong></td>
										<td><strong>:</strong> <?php echo $_POST['alamat'] ?></td>
									</tr>
									<tr>
										<td><strong>Kecamatan	</strong></td>
										<td><strong>:</strong> <?php $dis = explode(':',$_POST['district']); echo $dis[1] ?></td>
									</tr>
									<tr>
										<td><strong>Kota	</strong></td>
										<td><strong>:</strong> <?php $city = explode(':',$_POST['city']); echo $city[1] ?></td>
									</tr>
									<tr>
										<td><strong>Provinsi	</strong></td>
										<td><strong>:</strong> <?php $prov = explode(':',$_POST['province']); echo $prov[1] ?></td>
									</tr>
									<tr>
										<td><strong>Total Belanja	</strong></td>
										<td><strong>: <?php echo rupiah($total_sub) ?></strong></td>
									</tr>
								</table>

							</div><!-- /.detail-alamat -->

							<?php echo form_open('transaksi/order') ?>
								<input type="hidden" name="provinsi" value="<?=$prov[0]?>" />
								<input type="hidden" name="kota" value="<?=$city[0]?>" />
								<input type="hidden" name="kecamatan" value="<?=$dis[0]?>" >

								<input type="hidden" name="nama" value="<?=$_POST['nama']?>" />
								<input type="hidden" name="telp" value="<?=$_POST['telp']?>" />
								<input type="hidden" name="email" value="<?=$_POST['email']?>" />
								<input type="hidden" name="alamat" value="<?=$_POST['alamat']?>" />
								<input type="hidden" name="catatan" value="<?=$_POST['catatan']?>" />
								<div style="margin-top:15px;" class="form-group">
									<table class='table table-bordered table-striped'>
										<?php foreach ($cost['rajaongkir']['results'] as $res): ?>
											<tr class='head'>
												<td class='text-center' colspan='5'>
													<strong><?php echo strtoupper($res['code']) ?></strong>
												</td>
											</tr>
											<?php foreach ($res['costs'] as $cont): ?>
												<?php foreach ($cont['cost'] as $value): ?>

													<?php if (array_search($cont['service'], $service)): ?>
														<tr>
															<td class='text-center' style='width:5%'>
																<input type='radio' name='shipment' value='<?php echo $res['code'].':'.$cont['service']?>' required>
															</td>
															<td><?php echo $cont['service'] ?></td>
															<td><?php echo $cont['description'] ?></td>
															<td><?php echo $day = (empty($value['etd'])) ? '0' : $value['etd']; ?> Hari</td>
															<td><?php echo rupiah($value['value']) ?></td>
														 </tr>
													<?php endif ?>

												<?php endforeach ?>
											<?php endforeach ?>
										<?php endforeach ?>
									</table>
								</div>
								<div class="form-group voucher">
									<label for="voucher">Anda punya voucher?</label>
									<input id="inpVoucher" placeholder="masukan kode" type="text" value="">
									<button id="btnVoucher" class="btn btn-info" type="button" name="button">Cek voucher</button>
								</div>
								<div id="berhasilVou" class="ngumpet alert alert-success alert-dismissible fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Selamat!</strong> <span class="messageVou"></span>
								</div>
								<div id="gagalVou" class="ngumpet alert alert-danger alert-dismissible fade in">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Maaf..</strong> <span class="messageVou"></span>
								</div>

								<div class="form-group text-right">
									<input class="btn btn-success btn-cekout" type="submit" name="kirim" value="Submit Pemesanan" />
								</div>
							<?php echo form_close() ?>
						</div><!-- /.box-cart -->
					</div><!-- /.box-content -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#koneten-home -->
</div>

<script>
$('#btnVoucher').click(function() {
	var kode_voucher = $(this).prev().val();
	var obj = $(this)
	console.log(kode_voucher);
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('transaksi/cek_voucher');?>",
		data: { kode: kode_voucher},
		timeout : 3000,
		dataType: "JSON",
		error: function(xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		},
		success: function(data) {
			var parentVoucher = obj.parent()
			if (data.ketemu) {

				if (!parentVoucher.find('input[name=\'voucher\']').length) {
					parentVoucher.append("<input type='hidden' name='voucher' value='"+data.id_voucher+"' />");
				}else {
					parentVoucher.find('input[name=\'voucher\']').attr("value", data.id_voucher)
				}

				parentVoucher.find("#inpVoucher").css("border-color", "green")
				obj.removeClass()
				obj.addClass('btn btn-success')

				// alert message
				$("#gagalVou").css("display", "none")
				$("#berhasilVou").css("display", "block")
				$("#berhasilVou").find('span').text(data.pesan)

			}else {
				parentVoucher.find("#inpVoucher").css("border-color", "red")
				obj.removeClass()
				obj.addClass('btn btn-danger')

				// remove input hidden voucher
				if (parentVoucher.find('input[name=\'voucher\']').length) {
					parentVoucher.find('input[name=\'voucher\']').remove();
				}

				// alert message
				$("#berhasilVou").css("display", "none")
				$("#gagalVou").css("display", "block")
				$("#gagalVou").find('span').text(data.pesan)
			}
			// $("#id").val(data.id);
		}
	});
});
</script>
