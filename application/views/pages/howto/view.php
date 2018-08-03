<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="#">CARA BELANJA</a></li>
		</ol>
		<h2 class="ftimes">Cara Belanja</h2>
		<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
	</div><!-- /.map-halaman -->
</section>

<section id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="konten-about">
					 <div class="box-about">
								<!-- <div class="judul-box">
									<p>Cara Order Di Zuko</p>
								</div> -->
								<div class="isi-about">
								<?php foreach ($howto as $howto): ?>
									<h4>• <?php echo $howto->info_name ?></h4>
									<?php echo $howto->info_desc ?>
									<hr>
								<?php endforeach ?>
								</div>
							</div><!-- /.box-about -->
					</div><!-- /.konten-about -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
