<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>
					<li><a href="<?php echo site_url('berita'); ?>">Berita</a></li>
					<li class="active"><?php echo $article->article_title ?></li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<section id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="konten-berita">
					<div class="row">
						<div class="col-md-9">
							<div class="box-berita-detail">
								<div class="judul-berita"><?php echo $article->article_title ?></div>
								<div class="tgl-berita"><?php echo $info_date['datetime']; ?></div>
								<div class="img-berita">
									<img class="img" src="<?php echo base_url('uploads/img/article/'.$article->image_name); ?>" alt="<?php echo $article->article_alt ?>">
								</div>
								<div class="isi-berita">
								<?php echo $article->article_desc ?>
								</div>
							</div><!-- /.box-berita-detail -->
						</div><!-- /.col -->
						
						<div class="col-md-3">
							<?php // include "sidebar-berita.php"; ?>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.konten-produk -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>