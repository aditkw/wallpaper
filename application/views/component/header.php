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
					<p class="visible-lg-inline-block">Customer Servives: <strong><?=$contact->contact_cs?></strong></p>
					<p class="visible-lg-inline-block">Telepon: <strong><?=$contact->contact_phone?></strong></p>
					<p class="visible-lg-inline-block visible-sm-inline-block">WhatsApp: <strong><?=$contact->contact_wa?></strong></p>
					<p class="visible-lg-inline-block"><a class="text-putih" href="<?=site_url()?>#testi">Testimonial</a></p>
					<?php if ($member_access): ?>
					<p class="visible-lg-inline-block visible-xs-inline-block visible-sm-inline-block"><a class="text-putih" href="<?=site_url('member-area')?>"><i class="fa fa-user"></i> Member Area</a></p>
					<?php else: ?>
					<p class="visible-lg-inline-block visible-xs-inline-block visible-sm-inline-block">Silahkan, <a class="text-putih" href="<?=site_url('member-login')?>">login</a></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row logo">
			<div class="col-lg-1 col-xs-12 col-sm-12">
				<div class="visible-xs visible-sm" id="burgerKing">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
				</div>
				<div id="mySidenav" class="visible-xs visible-sm menu-panel">
					<div class="logo-menu">
						<img class="middle block" src="<?=site_url('dist/img/assets/head-mobile.png')?>" alt="">
					</div>
					<ul id="menu-toc" class="menu-toc">
						<li class="<?php echo empty($uri_1) ? 'menu-toc-current' : ''; ?>"><a href="<?=site_url();?>">Home</a></li>
						<li class="" onclick="subMenu()"><a>Produk <i class="fa fa-angle-down"></i></a></li>
						<div id="stat" class="sub-menu">
							<a href="<?=site_url('product/category/');?>"><i class="fa fa-circle-o"></i> test</a>
							<a href="<?=site_url('product/category/');?>"><i class="fa fa-circle-o"></i> test</a>
							<a href="<?=site_url('product/category/');?>"><i class="fa fa-circle-o"></i> test</a>
						</div>
						<li class=""><a href="<?=site_url('berita-event');?>">Berita/Event</a></li>
						<li class=""><a href="<?=site_url('tentang-kami');?>">Tentang Kami</a></li>
						<li class=""><a href="<?=site_url('cara-belanja')?>">Cara Belanja</a></li>
						<li class=""><a href="<?=site_url('kalkulator')?>">Kalkulator Wallpaper</a></li>
						<li class=""><a href="<?=site_url('hubungi-kami');?>">Hubungi Kami</a></li>
					</ul>
					<div class="sosmed">
						<p>Kontak kami:</p>
						<div class="kontak-menu">
							<p><i class="fa fa-user"></i> <strong><?=$contact->contact_cs?></strong></p>
							<p><i class="fa fa-phone"></i> <strong><?=$contact->contact_phone?></strong></p>
							<p><i class="fa fa-whatsapp"></i> <strong><?=$contact->contact_wa?></strong></p>
						</div>
						<p>Ikuti media sosial kami:</p>
						<a href="<?=$contact->contact_fb?>"><i class="fa fa-facebook"></i></a>
						<a href="<?=$contact->contact_tw?>"><i class="fa fa-twitter"></i></a>
						<a href="<?=$contact->contact_yt?>"><i class="fa fa-youtube"></i></a>
					</div>
				</div>
				<img class="middle block" src="<?=site_url('dist/img/assets/logo-wall.png')?>" alt="">
				<div class="cart-head visible-xs visible-sm">
					<div class="img">
						<a href="<?=site_url('keranjang')?>">
							<img src="<?=site_url('dist/img/assets/cart.png')?>" alt="">
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-5 visible-lg">
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
					<li><a href="<?=site_url('berita-event')?>">BERITA / EVENT</a></li>
					<li><a href="<?=site_url('tentang-kami')?>">TENTANG KAMI</a></li>
				</ul>
			</div>
			<div class="col-lg-4 col-xs-12">
				<form action="">
					<input type="text" value="" placeholder="Cari produk yang kamu butuhkan">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
			<div class="col-lg-2 visible-lg">
				<div class="cart-head">
					<div class="img">
						<a href="<?=site_url('keranjang')?>">
							<img src="<?=site_url('dist/img/assets/cart.png')?>" alt="">
						</a>
					</div>
					<div class="info-cart">
						<p>Keranjang</p>
						<p><strong><?=$cart_count?> Produk</strong> <!--<i class="fa fa-angle-down"></i> --></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</header>

<script>
$("#burgerKing").on("click", function(){
		$("#mySidenav").toggleClass("ganti");
	  $(this).toggleClass("change");
});

function subMenu(){
	$("#stat").toggle("fast");
}
</script>
