<?php
// echo "<pre>";
// print_r($brand_wp);
// echo "</pre>";
// die();
?>
<header>
	<div class="container-fluid">
		<div class="row">
			<div class="info">
				<div class="info-child">
					<p>Customer Servives: <strong><?=$contact->contact_cs?></strong></p>
					<p>Telephone: <strong><?=$contact->contact_phone?></strong></p>
					<p>WhatsApp: <strong><?=$contact->contact_wa?></strong></p>
					<p><a href="#">Testimonial</a></p>
					<p>Please, <a href="#">login</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1">
				<img src="<?=site_url('dist/img/assets/logo-wall.png')?>" alt="">
			</div>
			<div class="col-lg-5">
				<ul>
					<li><a href="<?=site_url()?>">BERANDA</a></li>
					<li class="relative"><a href="#">PRODUK</a>
						<ul>
							<?php foreach ($categories as $category): ?>
								<?php $brand_ex = $this->brand_model->get_by(array('category_id' => $category->category_id)) ?>
								<li class="relative"><a class="text-putih" href="<?=site_url('produk/'.$category->category_link)?>"><?=$category->category_name?><?php if($brand_ex): ?>
									<i class="pull-right fa fa-angle-right"></i>
								<?php endif; ?></a>
									<ul>
										<?php foreach ($brand_ex as $brand): ?>
											<li><a class="text-putih" href="<?=site_url('produk/'.$category->category_link.'/'.title_url($brand->brand_link))?>"><?=$brand->brand_name?></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
					<li><a href="">BERITA / EVENT</a></li>
					<li><a href="">TENTANG KAMI</a></li>
				</ul>
			</div>
			<div class="col-lg-4">
				<form action="">
					<input type="text" value="" placeholder="Cari produk yang kamu butuhkan">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<div class="col-lg-2">
				<div class="cart-head">
					<div class="img">
						<a href="<?=site_url()?>">
							<img src="<?=site_url('dist/img/assets/cart.png')?>" alt="">
						</a>
					</div>
					<div class="info-cart">
						<p>My Cart</p>
						<p><strong>2 Product</strong> <i class="fa fa-angle-down"></i></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</header>
