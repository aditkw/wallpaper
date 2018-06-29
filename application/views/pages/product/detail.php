<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url();?>"><i class="fa fa-home"></i></a></li>
					<li><a href="<?php echo site_url('produk');?>">Produk</a></li>
					<li><a href="<?php echo site_url('produk/kategori/'.$product->category_link);?>"><?php echo ucwords($product->category_name) ?></a></li>
					<li class="active"><?php echo ucwords($product->product_name) ?></li>
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
					<div class="produk-detail">
						<div class="row">
							<div class="col-md-5">
								<h2 class="nama-produk-res hidden-lg hidden-md"><?php echo ucwords($product->product_name) ?></h2>
								<div class="img-produk">
									<img class="img" src="<?php echo base_url('uploads/img/product/'.$product->image_name) ?>" alt="<?php echo ucwords($product->product_alt) ?>">
								</div>
							</div><!-- /.col -->
							<div class="col-md-7">
								<div class="detail-pro">
									<h2 class="nama-produk visible-lg visible-md"><?php echo ucwords($product->product_name); ?></h2>
									<div class="box-katpro">
										<table>
											<tr>
												<td><strong>Kategori</strong></td><td>:</td><td><?php echo ucwords($product->category_name); ?></td>
											</tr>
											<tr>
												<td><strong>Merk</strong></td><td>:</td><td>nama Merk</td>
											</tr>
										</table>
										<?php if ($product->product_stock > 0): ?>
											<div class="label-stok">In Stock</div>
										<?php else: ?>
											<div class="label-stok">Out of Stock</div>
										<?php endif ?>
									</div><!-- /.box-katpro -->
									
									<div class="item-detail-pro">
										<div class="harga-produk">RP <?php echo number_format($product->product_price); ?></div>
									</div><!-- /.item-detail-pro -->
									
									<?php $product_id = hash_link_encode($this->encrypt->encode($product->product_id)); ?> 
									<?php echo form_open('keranjang/buy?cd='.$product_id); ?>
										<div class="box-qty-pro clearfix">
											<?php if ($product->product_stock > 0): ?>
												<div class="qty-left pull-left">
													<div class="input-group input-group-sm">
														<span class="input-group-addon">Quantity</span>
														<span class="input-group-btn">
															<button class="btn btn-default" type="button" onClick="kurang()"><i class="fa fa-minus"></i></button>
														</span>
														<input type="text" class="form-control text-center" id="qty" name="qty" value="1" required>
														<span class="input-group-btn">
															<button class="btn btn-default" type="button" onClick="tambah()"><i class="fa fa-plus"></i></button>
														</span>
													</div><!-- /input-group -->
												</div>
											<?php endif ?>
											<div class="qty-right pull-right">
												<ul class="ul share-sosmed">
													<li>
														<a target="_blank" href="http://twitter.com/share?" onclick="window.open(this.href,'Twit','height=400,width=530,scrollbars=yes'); return false;" title="">
															<i class="fa fa-twitter twt"></i> Tweet
														</a>
													</li>
													<li>
														<a href="http://www.facebook.com/sharer.php?" onclick="window.open(this.href,'shared', 'height=400,width=530,scrollbars=yes'); return false;" title="">
															<i class="fa fa-facebook fb"></i> Share
														</a>
													</li>
													<li>
														<a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=" onclick="window.open(this.href,'shared','height=400,width=530,scrollbars=yes'); return false;">
															<i class="fa fa-google-plus gp"></i> Google+
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.box-qty-pro -->
										<?php if (in_cart($product->product_id, $cart_product)): ?>
											<button class="btn-beli-pro active" type="button" onclick="window.location.href='<?php echo site_url('keranjang-belanja') ?>' "><i class="fa fa-shopping-bag"></i> Keranjang</button>
										<?php elseif ($product->product_stock > 0): ?>
											<button class="btn-beli-pro" type="submit" name="kirim"><i class="fa fa-shopping-cart"></i> BELI</button>
										<?php else: ?>
											<button class="btn-beli-pro active" disabled><i class="fa fa-meh-o"></i> Habis</button>
										<?php endif ?>
									<?php echo form_close(); ?>
								</div><!-- /.detail-pro -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
						<div class="box-deskripsi">
							<div class="tag-deskripsi">DESKRIPSI</div>
							<div class="isi-deskripsi">
							<?php echo $product->product_desc; ?>
							</div>
						</div><!-- /.box-deskripsi -->
					</div><!-- /.produk-detail -->
				</div><!-- /.konten-produk -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<section id="best-seller">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tag-konten">
					<div class="nama-tag-konten">PRODUK TERKAIT</div>
				</div><!-- /.tag-konten -->
				
				<div class="box-bestpro owl-bestpro">
					<?php foreach ($products as $products): ?>
						<?php $product_id = hash_link_encode($this->encrypt->encode($products->product_id)); ?> 
						<div class="item-bestpro">
							<a href="<?php echo site_url('produk/detail/'.$products->product_code.'/'.$products->product_link); ?>">
								<img class="img" src="<?php echo base_url('uploads/img/product/'.$products->image_name); ?>" alt="<?php echo $products->product_alt; ?>">
							</a>
							<div class="judul-bestpro">
								<a href="<?php echo site_url('produk/detail/'.$products->product_code.'/'.$products->product_link); ?>">
									<?php echo ucwords($products->product_name); ?>
								</a>
							</div>
							<div class="kat-bestpro"><?php echo ucwords($products->category_name); ?></div>
							<div class="harga-bestpro">Rp <?php echo number_format($products->product_price); ?></div>
							<div class="item-cart-bestpro">
								<?php if (in_cart($products->product_id, $cart_product)): ?>
									<a class="btn-beli" href="<?php echo site_url('keranjang-belanja') ?>">
										KERANJANG
									</a>
									<?php elseif ($products->product_stock > 0): ?>
										<a class="btn-beli" href="<?php echo site_url('keranjang/buy?cd='.$product_id) ?>">
											BELI
										</a>
									<?php else: ?>
										<a class="btn-beli" href="#">
											HABIS
										</a>
									<?php endif ?>
								<a class="btn-viewpro pull-right" href="<?php echo site_url('produk/detail/'.$products->product_code.'/'.$products->product_link); ?>">
									<i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					<?php endforeach ?>
				</div><!-- /.box-bestpro -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /#best-seller -->

<script type="text/javascript">
	function tambah()
	{
		var qty = document.getElementById("qty").value;
		
		if(qty >= <?php echo $product->product_stock; ?>){
			var hasil = <?php echo $product->product_stock; ?>;
		}else{
			var hasil = eval(qty)+1;
		}
		document.getElementById("qty").value = hasil;
		//document.getElementById("jum").value = hasil;
	}
	
	function kurang()
	{
		var qty = document.getElementById("qty").value;
		
		if(qty > 1)
		{
			var hasil = eval(qty)-1;
		}
		else
		{
			var hasil = 1;
		}
		
		document.getElementById("qty").value = hasil;
		//document.getElementById("jum").value = hasil;
	}
</script>

