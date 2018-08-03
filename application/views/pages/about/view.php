<div class="about">
	<section id="atas">
		<div class="nav-text text-center middle">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
				<li><a href="#">TENTANG KAMI</a></li>
			</ol>
			<h2 class="ftimes">Tentang Kami</h2>
			<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
		</div><!-- /.map-halaman -->
	</section>
	<section id="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-justify">
					<img style="max-width:400px;margin-right:15px;float:left;" src="<?=site_url('uploads/img/about/'.$about->info_image)?>" alt="">
					<h3 style="margin-top:0"><?=$about->info_name?></h3>
					<?=$about->info_desc?>
				</div>
			</div>
		</div>
	</section>
</div>
