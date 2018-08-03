<div class="artikel">
<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="#">BERITA & EVENT</a></li>
		</ol>
		<h2 class="ftimes">BERITA & EVENT</h2>
		<p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p>
	</div><!-- /.map-halaman -->
</section>

<section id="konten">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<?php foreach ($articles as $article): ?>
					<?php if (!empty($_GET['tag'])): ?>
						<?php if (in_array(strtolower($_GET['tag']), explode(',', strtolower(str_replace(' ', '', $article->article_tag))))): ?>
							<div class="col-md-6">
									<div class="box-news animation-element">
										<img class="img-responsive" src="<?=site_url("uploads/img/article/$article->image_name")?>" alt="">
										<p><?=limitKalimat($article->article_title, 38)?></p>
										<p><i class="fa fa-calendar"></i> <?=convertDate($article->article_date)?></p>
										<p><?=limitKalimat($article->article_desc, 100)?></p>
										<p class="text-right"><a href="<?=site_url("berita-event/$article->article_link")?>">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a></p>
									</div>
								</div>
						<?php endif; ?>
						<?php else: ?>
							<div class="col-md-6">
									<div class="box-news animation-element">
										<img class="img-responsive" src="<?=site_url("uploads/img/article/$article->image_name")?>" alt="">
										<p><?=limitKalimat($article->article_title, 38)?></p>
										<p><i class="fa fa-calendar"></i> <?=convertDate($article->article_date)?></p>
										<p><?=limitKalimat($article->article_desc, 100)?></p>
										<p class="text-right"><a href="<?=site_url("berita-event/$article->article_link")?>">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a></p>
									</div>
								</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="col-md-3">
				<div class="this-tag">
					<h3>TAG</h3>
					<?php foreach ($tags as $tag): ?>
						<a href="<?=site_url('berita-event?tag='.strtolower(str_replace(' ', '', $tag->tag_name)))?>">
							<span><?=$tag->tag_name?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
</section>
</div>
