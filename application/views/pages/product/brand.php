<div class="detail-brand">
	<section id="atas-brand" class="relative">
		<?php if ($banner): ?>
			<img class="img-responsive" src="<?=site_url("uploads/img/product/".$banner[0]->image_name)?>" alt="">
			<?php else: ?>
			<img class="img-responsive" src="<?=site_url("dist/img/assets/no-prod.png")?>" alt="">
			<?php endif; ?>
		<div class="box-info">
			<p class="f-mont pull-left"><?=$brand->brand_name?></p>
			<p class="f-mont pull-right text-right"><?=rupiah($brand->brand_price)?></p>
			<div class="clear"></div>
			<table>
				<tr>
					<td>Ukuran Wallpaper</td>
					<td><?=$brand->brand_size?></td>
				</tr>
				<tr>
					<td>Berat Wallpaper</td>
					<td><?=$brand->brand_weight?></td>
				</tr>
				<tr>
					<td>Tahun Terbit</td>
					<td><?=$brand->brand_launch?></td>
				</tr>
			</table>
		</div>
		<div class="box-gambar">
			<div id="prodBrand" class="owl-carousel">
				<?php foreach($banner as $banner): ?>
				<img src="<?=site_url("uploads/img/product/$banner->image_name")?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="konten">
		<div class="container">
			<div class="row bread">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
						<li><a href="#">PRODUK</a></li>
						<li><a href="<?=site_url('produk/'.$brand->category_link)?>"><?=strtoupper($brand->category_name)?></a></li>
						<li><a href="<?=site_url('produk/'.$brand->category_link.'/'.$brand->brand_link)?>"><?=strtoupper($brand->brand_name)?></a></li>
					</ol>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 menu-sort">
					<div class="merk">
						<p class="f-mont text-biru"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;Merk</p>
						<?php foreach ($brands as $brand): ?>
						<?php $count = $this->product_model->count(array('brand_id' => $brand->brand_id)) ?>
							<p><a href="<?=site_url('produk/'.$uri_2.'/'.$brand->brand_link)?>"><?=$brand->brand_name?> (<?=$count?>)</a></p>
						<?php endforeach; ?>
						<p id="lainMerk">Lainnya <i class="fa fa-angle-down"></i></p>
					</div>
					<div class="filter">
						<p class="f-mont text-biru"><i class="fa fa-filter"></i>&nbsp;&nbsp;Filter Produk</p>
						<div class="motif">
							<p class="text-xbabu">Berdasarkan motif</p>
							<?php foreach ($motif as $motif): ?>
								<p><input class="motifcheck" type="checkbox" value="<?=$motif->motif_link?>">&nbsp;&nbsp;<?=$motif->motif_name?></p>
							<?php endforeach; ?>
							<p class="text-xbabu" id="lainMotif">Tampilkan lebih sedikit <i class="fa fa-angle-up"></i></p>
						</div>
						<div class="warna">
							<p class="text-xbabu">Berdasarkan warna</p>
							<?php foreach ($color as $color):
								if (!empty($_GET['color'])){
							    $color_get = explode(',', $_GET['color']);
							    (in_array($color->color_link, $color_get)) ? $checked = 'checked' : $checked = '' ;
							  }
							  else {
							    $checked = '';
							  }
							?>
								<p><input <?=$checked?> class="colorcheck" type="checkbox" value="<?=$color->color_link?>">&nbsp;&nbsp;<?=$color->color_name?></p>
							<?php endforeach; ?>
							<p class="text-xbabu" id="lainWarna">Tampilkan lebih sedikit <i class="fa fa-angle-up"></i></p>
						</div>
						<?=form_open("produk/wallpaper/$uri_3", array('method' => 'GET'))?>
						<div class="harga">
							<p class="text-xbabu">Berdasarkan harga</p>
							<div class="pull-left">
								<p>Min</p>
								<input name="from" class="form-control" type="number" value="">
							</div>
							<div class="pull-right">
								<p>Max</p>
								<input name="to" class="form-control" type="number" value="">
							</div>
							<button style="margin-top: 5px;" class="btn btn-info form-control" type="submit">Submit</button>
							<div class="clear"></div>
						</div>
						<?=form_close()?>
					</div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="col-md-12 ">
						<div class="pull-left text-left">
							<p>Menampilkan <span id="totalP"></span> dari <?=$num_rows?> hasil</p>
						</div>
						<div class="pull-right text-right">
							<p>
								<?php $row_http_result = parse_http_lwd($http_result, 'tampil') ?>
								Menampilkan <a href="<?='?tampil=12&'.$row_http_result?>">12</a> <a href="<?='?tampil=24&'.$row_http_result?>">24</a> <a href="<?='?tampil=36&'.$row_http_result?>">36</a> <a href="<?='?tampil=48&'.$row_http_result?>">48</a>
							</p>
						</div>
					</div>
					<?php if (!$product): ?>
					<div class="col-md-12">
						<div class="alert alert-danger">
							<p>Maaf, saat ini produk belum tersedia.</p>
						</div>
					</div>
					<?php endif; ?>
					<?php foreach($product as $product): ?>
					<div class="col-md-4 box-prod">
						<div class="img-hover relative">
							<img class="max-width" src="<?=site_url("uploads/img/product/$product->image_name")?>" alt="">
							<div class="hover-detail">
								<a href="<?=site_url("produk/detail/$product->product_code/$product->product_link")?>"><i class="fa fa-search"></i></a>
							</div>
						</div>
						<div class="info relative no-margin-p">
							<p class="f-mont"><img src="<?=site_url('dist/img/assets/brand.png')?>" style="width:20px;vertical-align:text-bottom"> <?=$product->brand_name?> - <?=$product->product_code?></p>
							<p class="f-mont"><span class="strip"><?=rupiah($product->product_price_strip)?></span> <?=rupiah($product->product_price)?></p>
							<?php if ($product->product_discount): ?>
								<div class="disc text-center"><p><strong>DISC<br><?=$product->product_discount?>%</strong></p></div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
					<div class="col-md-12">
						<?php echo $pagination ?>
					</div>
				</div>
			</div>
		</div><!-- /.container -->
	</section>
</div>

<script>
	let totalP = document.getElementById('totalP')
	let boxProd = document.getElementsByClassName('box-prod')
	let hitung = boxProd.length

	totalP.innerHTML = hitung

</script>
