<div class="map-halaman map-khusus">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Metode Pengiriman</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

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
								<tr>	
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
							
							<div class="form-group">
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
	