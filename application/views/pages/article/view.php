<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>
					<li class="active">Berita</li>
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
							<div class="box-list-berita">
							<?php foreach ($article as $article): ?>
								<div class="list-berita">
									<div class="row">
										<div class="col-sm-4">
											<div class="img-list-berita">
												<a href="<?php echo site_url('berita/baca/'.$article->article_link) ?>">
													<img class="img" src="<?php echo base_url('uploads/img/article/'.$article->image_name); ?>" alt="<?php echo $article->article_alt ?>">
												</a>
											</div><!-- /.img-list-berita -->
										</div><!-- /.col -->
										<div class="col-md-8">
											<div class="konten-list-berita">
												<div class="jud-list-berita">
													<a href="<?php echo site_url('berita/baca/'.$article->article_link) ?>">
														<?php echo $article->article_title ?>
													</a>
												</div>
												<div class="tgl-list-berita">
													<?php 
													$date = indonesian_date($article->article_date);													
													echo $date['datetime'].' WIB';
													?>

												</div>
												<div class="subisi-list-berita">
													<?php echo $article->article_review ?>
												</div>
											</div><!-- /.konten-list-berita -->
										</div><!-- /.col -->
									</div><!-- /.row -->
								</div><!-- /.list-berita -->
							<?php endforeach ?>
							</div><!-- /.box-list-berita -->
							
							<div class="box-page text-right">
								<?php echo $pagination ?>
							</div><!-- /.page -->
						</div><!-- /.col -->
						
						<div class="col-md-3">
							
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.konten-produk -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>	