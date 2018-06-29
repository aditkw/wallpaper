<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url() ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Syarat dan Ketentuan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<section id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="konten-about">
					<div class="row">
						<div class="col-md-9">
							<div class="box-about">
								<h2 class="tag-page">Syarat dan Ketentuan</h2>
								<div class="isi-about">
								<?php foreach ($term as $term): ?>
									<h4># <?php echo $term->info_name ?></h4>
									<?php echo $term->info_desc ?>
								<?php endforeach ?>
								</div>
							</div><!-- /.box-about -->
						</div><!-- /.col -->
						
						<div class="col-md-3">
					  		<?php // include "sidebar-berita.php"; ?>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.konten-about -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
