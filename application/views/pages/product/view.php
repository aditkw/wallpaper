<!-- <section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section> -->
<div class="product-brand">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">PRODUK</a></li>
				<li><a href="<?=site_url('produk/'.$uri_2)?>"><?=strtoupper(str_replace('-',' ',$uri_2))?></a></li>
			</ol>
			<h2 class="ftimes">Our Brands</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>

	<section id="konten">
		<div class="container">
			<div class="row sorting">
				<div class="col-md-3">
					Menampilkan <a href="<?='?tampil=15&'.$http_result?>">15</a> <a href="<?='?tampil=30&'.$http_result?>">30</a> <a href="<?='?tampil=60&'.$http_result?>">60</a> <a href="<?='?tampil=90&'.$http_result?>">90</a>
				</div>
				<div class="col-md-6">
					<ul class="pane-browse">
						<?php foreach ($motif as $motif): ?>
						<li><a class="text-titem" href="?motif=<?=$motif->motif_link?>"><?=strtoupper($motif->motif_name)?></a></li>
					<?php endforeach; ?>
					</ul>
				</div>
				<div class="col-md-3">
					<select class="form-control" onChange="window.location=this.options[this.selectedIndex].value">
						<?php $sort_http_result = parse_http_lwd($http_result, 'sort_brand') ?>
						<option value="<?php echo '?'.$sort_http_result?>" <?php if (!empty($_GET['sort_brand'])): ?><?php if ($_GET['sort_brand'] == ''): ?> selected <?php endif ?><?php endif ?>>default</option>
						<option value="<?php echo '?sort_brand=terbaru&'.$sort_http_result ?>" <?php if (!empty($_GET['sort_brand'])): ?><?php if ($_GET['sort_brand'] == 'terbaru'): ?> selected <?php endif ?> <?php endif ?>>Terbaru</option>
						<option value="<?php echo '?sort_brand=terlama&'.$sort_http_result ?>" <?php if (!empty($_GET['sort_brand'])): ?><?php if ($_GET['sort_brand'] == 'terlama'): ?> selected <?php endif ?> <?php endif ?>>Terlama</option>
						<option value="<?php echo '?sort_brand=termurah&'.$sort_http_result ?>" <?php if (!empty($_GET['sort_brand'])): ?><?php if ($_GET['sort_brand'] == 'termurah'): ?> selected <?php endif ?> <?php endif ?>>Harga Terendah ke Harga Tertinggi</option>
						<option value="<?php echo '?sort_brand=termahal&'.$sort_http_result ?>" <?php if (!empty($_GET['sort_brand'])): ?><?php if ($_GET['sort_brand'] == 'termahal'): ?> selected <?php endif ?> <?php endif ?>>Harga Tertinggi ke Harga Terendah</option>
					</select>
				</div>
			</div>

			<div class="row">
				<?php foreach($brand_item as $brand): ?>
				<div class="col-md-3 box-prod">
					<div class="img-hover relative">
						<img class="max-width" src="<?=site_url("uploads/img/brand/$brand->brand_image")?>" alt="">
						<div class="hover-detail">
							<a href="<?=site_url("produk/$uri_2/$brand->brand_link")?>"><i class="fa fa-search"></i></a>
						</div>
					</div>
					<div class="info relative no-margin-p">
						<p class="f-mont"><img src="<?=site_url('dist/img/assets/brand.png')?>" style="width:20px;vertical-align:text-bottom"> <?=$brand->brand_name?></p>
						<p class="f-mont"><span class="strip"><?=rupiah($brand->brand_price_strip)?></span> <?=rupiah($brand->brand_price)?></p>
						<?php if ($brand->brand_discount): ?>
							<div class="disc text-center"><p><strong>DISC<br><?=$brand->brand_discount?>%</strong></p></div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
			<?php echo $pagination; ?>
		</div><!-- /.container -->
	</section>
</div>
