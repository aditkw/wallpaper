<div class="detail-produk">
	<section id="konten">
		<div class="garis-bread">
			<div class="container">
				<div class="row bread">
					<div class="col-md-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
							<li><a href="#">PRODUK</a></li>
							<li><a href="<?=site_url('produk/'.$product->category_link)?>"><?=strtoupper($product->category_name)?></a></li>
							<li><a href="<?=site_url('produk/'.$product->category_link.'/'.$product->brand_link)?>"><?=strtoupper($product->brand_name)?></a></li>
							<li><a href="#"><?=strtoupper($product->product_name)?></a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="produk-det">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
            <div class="col-md-2 gambar-kecil col-xs-12 no-padding">
							<?php foreach($product_image as $image): ?>
              <div class="col-md-12 col-xs-2 m-bot small-img no-padding">
                <img class="max-width" id="small" src="<?php echo base_url("uploads/img/product/$image->image_name");?>" alt="">
              </div>
						<?php endforeach; ?>
            </div>
            <div class="col-md-10 col-xs-12 gambar-gede">
              <div class="bungkus">
                <a data-caption="" data-fancybox="images-prod" href="<?php echo base_url('uploads/img/product/'.$product_image[0]->image_name);?>"><img class="max-width" src="<?php echo base_url('uploads/img/product/'.$product_image[0]->image_name);?>" alt=""></a>
              </div>
            </div>
          </div>
					<div class="col-md-6 col-xs-12 samping-gambar">
						<h3 class="f-mont text-tebel mt-bot"><?=$product->product_name?></h3>
						<p class="f-mont text-tebel">Page: <?=$product->product_seq?></p>
						<div class="ket-harga">
							<table class="pull-left">
								<tr>
									<td>Jenis</td>
									<td>:</td>
									<td><?=$product->category_name?></td>
								</tr>
								<tr>
									<td>Merk</td>
									<td>:</td>
									<td><?=$product->brand_name?></td>
								</tr>
								<tr>
									<td>Kode</td>
									<td>:</td>
									<td><?=$product->product_code?></td>
								</tr>
								<tr>
									<td>Warna</td>
									<td>:</td>
									<td><?=$product->color_name?></td>
								</tr>
								<tr>
									<td>Motif</td>
									<td>:</td>
									<td><?=$product->motif_name?></td>
								</tr>
							</table>
							<div class="pull-right text-right harga">
								<?php if ($product->product_stock): ?>
									<p class="text-ijo text-tebel">AVAILABLE</p>
								<?php else: ?>
									<p class="text-merah text-tebel">OUT OF STOCK</p>
								<?php endif; ?>
								<p class="nominal text-tebel"><span class="harga-coret text-babu"><?=rupiah($product->product_price_strip)?></span> <?=rupiah($product->product_price)?></p>
							</div>
							<div class="clear"></div>
						</div>
						<div class="add-to-cart">
							<?php
							$product_id = $product->product_id;
              $product_id = hash_link_encode($this->encrypt->encode($product_id));
							?>
							<?php echo form_open('keranjang/buy?cd='.$product_id) ?>
							<div class="kuantitas pull-left">
								<label for="qty">Kuantitas</label>
                <input id="qty" type="text" name="qty" value="1" required>
							</div>
							<div class="btn-cart pull-left">
								<?php if(in_cart($product->product_id, $cart_product)): ?>
									<a href="<?=site_url('keranjang')?>"><button class="button" type="button">KERANJANG</button></a>
								<?php elseif ($product->product_stock > 0): ?>
									<button class="button" type="submit" name="kirim">ADD TO CART</button>
								<?php else: ?>
									<button type="button" class="button" disabled>HABIS</button>
								<?php endif; ?>
							</div>
							<div class="sosmed pull-left">
								<img src="<?=site_url('dist/img/assets/share-fb.png')?>" alt="">
								<img src="<?=site_url('dist/img/assets/share-tw.png')?>" alt="">
								<img src="<?=site_url('dist/img/assets/share-gplus.png')?>" alt="">
							</div>
							<div class="clear"></div>
							<?php echo form_close() ?>
						</div>
						<div class="info-warna">
							<p>Warna yang sebenarnya dapat bervariasi dari warna di layar Anda karena<br>pantau pembatasan warna. <a href="<?=site_url('hubungi-kami')?>">Hubungi kami</a> untuk info selengkapnya.</p>
						</div>
						<div class="kalkulator">
							<img class="pull-left" src="<?=site_url('dist/img/assets/kalku-prod.png')?>" alt="">
							<div class="ket-kalku pull-left">
								<p class="mt-bot f-mont text-tebel">BERAPA BANYAK WALLPAPER YANG ANDA BUTUHKAN?</p>
								<p>Anda bisa cari tahu dengan menggunakan Kalkulator Wallpaper kami.</p>
								<a href="<?=site_url('kalkulator')?>"><button type="button" name="button">MULAI HITUNG</button></a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="row related">
					<div class="col-md-12">
						<p class="text-center text-biru">PRODUK KAMI</p>
						<p class="f-times text-center">Produk Yang Mungkin Anda Suka</p>
					</div>
					<div class="col-md-12">
						<div id="owl-related" class="owl-carousel">
							<?php foreach($products as $related): ?>
			        <div class="box-prod col-md-12">
			          <div class="img-hover relative">
			            <img class="max-width" src="<?=site_url("uploads/img/product/$related->image_name")?>" alt="">
			            <div class="hover-detail">
			              <a href="<?=site_url("produk/detail/$related->product_code/$related->product_link")?>"><i class="fa fa-search"></i></a>
			            </div>
			          </div>
			          <div class="info relative no-margin-p">
			            <p class="f-mont"><img src="<?=site_url('dist/img/assets/brand.png')?>" style="width:20px;vertical-align:text-bottom;display:inline;"> <?=$related->brand_name?> - <?=$related->product_code?></p>
			            <p class="f-mont"><span class="strip"><?=rupiah($related->product_price_strip)?></span> <?=rupiah($related->product_price)?></p>
									<?php if ($related->product_discount): ?>
										<div class="disc text-center"><p><strong>DISC<br><?=$related->product_discount?>%</strong></p></div>
									<?php endif; ?>
			          </div>
			        </div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
