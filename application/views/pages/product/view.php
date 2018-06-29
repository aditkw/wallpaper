<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>

						<!-- Jika uri 2 tersedia, maka breadcrumb menampilkan kategori -->
						<?php if ($uri_3): ?>
							<li><a href="<?php echo site_url('produk'); ?>" title="Produk">Produk</a></li>
							<li><?php echo ucwords($uri_2); ?></li>

							<?php if ($uri_2 == 'kategori' && empty($_GET['brand'])): ?>
								<li class="active"><?php echo $category->category_name ?></li>

							<?php elseif ($uri_2 == 'kategori' && !empty($_GET['brand'])): ?>
								<li>
									<a href="<?php echo site_url('produk/kategori/'.$uri_3); ?>" title="<?php echo $category->category_name ?>">
										<?php echo $category->category_name ?>
									</a>
								</li>
								<li class="active"><?php echo $_GET['brand']; ?></li>
							<?php endif ?>

						<!-- Jika tidak ada uri 2, maka default breadcrumb adalah produk -->
						<?php else: ?>
							<li class="active">Produk</li>
						<?php endif ?>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<section id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="konten-produk">
					<!-- Sidebar -->
					<?php $this->load->view('component/sidebar-product');?>
					<div class="box-produk">
						<div class="tag-produk">

							<?php if (!empty($_GET['cari'])): ?>
								Result "<?php echo $_GET['cari'] ?>"

							<?php else: ?>

								<?php if ($uri_2 == 'kategori'): ?>
									<?php echo $category->category_name; ?>

								<?php else: ?>
									Produk
								<?php endif ?>

								<?php if(!empty($_GET['brand'])): ?>
									&raquo; <?php echo $_GET['brand'] ?>
								<?php endif ?>
							<?php endif ?>

						</div>
						<div class="subtag-produk"></div>
						<div class="page-top clearfix">
							<div class="halaman pull-left visible-lg visible-md">
								<div class="item-hal tag">Page</div>
								<div class="item-hal">
									<select class="drop-hal" onChange="window.location=this.options[this.selectedIndex].value">
										<?php for($x = 1; $x <= $num_page; $x++) :?>
											<?php if ($uri_3 == NULL): ?>
												<option value="<?php echo site_url('produk/'.$x.'?'.$http_result);?>" <?php if ($x == $on_page): ?> selected <?php endif ?>>
													<?=$x?>
												</option>
											<?php else: ?>
												<option value="<?php echo site_url('produk/kategori/'.$uri_3.'/'.$x.'?'.$http_result);?>" <?php if ($x == $on_page): ?> selected <?php endif ?>>
													<?=$x?>
												</option>
											<?php endif ?>
										<?php endfor ?>
									</select>
								</div>
								<div class="item-hal">of <?php echo $num_page ?></div>
							</div>

							<div class="halaman pull-left hidden-lg hidden-md">
								<div class="item-hal">
									<button class="btn btn-info btn-sm target-menu-merk"><i class="fa fa-tags"></i> <span class="hidden-320">Berdasarkan</span> Merk</button>
								</div>
							</div>

							<div class="halaman pull-right">
								<div class="item-hal tag">Sort by :</div>
								<div class="item-hal">
									<?php $sort_http_result = parse_http_lwd($http_result, 'sort');?>
									<select class="drop-hal" onChange="window.location=this.options[this.selectedIndex].value">
										<option value="<?php echo '?'.$sort_http_result?>" <?php if (!empty($_GET['sort'])): ?><?php if ($_GET['sort'] == ''): ?> selected <?php endif ?><?php endif ?>>default</option>
										<option value="<?php echo '?sort=terbaru&'.$sort_http_result ?>" <?php if (!empty($_GET['sort'])): ?><?php if ($_GET['sort'] == 'terbaru'): ?> selected <?php endif ?> <?php endif ?>>terbaru</option>
										<option value="<?php echo '?sort=terlama&'.$sort_http_result ?>" <?php if (!empty($_GET['sort'])): ?><?php if ($_GET['sort'] == 'terlama'): ?> selected <?php endif ?> <?php endif ?>>terlama</option>
										<option value="<?php echo '?sort=termurah&'.$sort_http_result ?>" <?php if (!empty($_GET['sort'])): ?><?php if ($_GET['sort'] == 'termurah'): ?> selected <?php endif ?> <?php endif ?>>termurah</option>
										<option value="<?php echo '?sort=termahal&'.$sort_http_result ?>" <?php if (!empty($_GET['sort'])): ?><?php if ($_GET['sort'] == 'termahal'): ?> selected <?php endif ?> <?php endif ?>>termahal</option>
									</select>
									<?php echo $sort_http_result ?>
								</div>
							</div>

							<div class="menu-merk">
								<ul class="ul">
									<?php for ($i=0; $i < 7; $i++) :?>
										<li><a href="#">Merk</a></li>
									<?php endfor ?>
								</ul>
							</div>
						</div><!-- /.page-top -->

						<div class="box-pro boxpro">
							<?php foreach ($product as $product): ?>
								<?php $product_id = hash_link_encode($this->encrypt->encode($product->product_id)); ?>
								<div class="item-pro">
									<a href="<?php echo site_url('produk/detail/'.$product->product_code.'/'.$product->product_link); ?>">
										<img class="img" src="<?php echo base_url('uploads/img/product/'.$product->image_name); ?>" alt="">
									</a>
									<div class="judul-pro"><a href="<?php echo site_url('produk/detail/'.$product->product_code.'/'.$product->product_link); ?>"><?php echo ucwords($product->product_name); ?></a></div>
									<div class="kat-pro"><?php echo ucwords($product->category_name); ?></div>
									<div class="harga-pro">Rp. <?php echo number_format($product->product_price); ?></div>
									<div class="item-cart-pro">
										<?php if (in_cart($product->product_id, $cart_product)): ?>
											<a class="btn-beli" href="<?php echo site_url('keranjang-belanja') ?>">
												KERANJANG
											</a>
										<?php elseif ($product->product_stock > 0): ?>
											<a class="btn-beli" href="<?php echo site_url('keranjang/buy?cd='.$product_id) ?>">
												BELI
											</a>
										<?php else: ?>
											<a class="btn-beli" href="#">
												HABIS
											</a>
										<?php endif ?>
										<a class="btn-viewpro pull-right" href="<?php echo site_url('produk/detail/'.$product->product_code.'/'.$product->product_link); ?>"><i class="fa fa-search"></i></a>
									</div>
								</div>
							<?php endforeach ?>
						</div><!-- /.box-bestpro -->
						<div class="box-page page-produk">
							<?php echo $pagination; ?>
						</div><!-- /.page -->
					</div><!-- /.box-produk -->
				</div><!-- /.konten-produk -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
