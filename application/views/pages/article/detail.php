<div class="news-detail">
<section id="atas">
	<div class="nav-text text-center middle">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url(); ?>">BERANDA</a></li>
			<li><a href="<?php echo site_url('berita-event'); ?>">BERITA & EVENT</a></li>
			<li><a href="#"><?=$article->article_title?></a></li>
		</ol>
		<h2 class="ftimes"><?=$article->article_title?></h2>
		<!-- <p class="ftimes text-xbabu"><em><?=$ruang_tulis?></em></p> -->
	</div><!-- /.map-halaman -->
</section>

<section id="konten">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
          <div class="col-md-12">
            <!-- <div class="user">
              <i class="fa fa-user"></i> <?=$article->user_name?>
            </div> -->
            <div class="tanggal">
              <i class="fa fa-calendar"></i> <?=convertDate($article->article_date)?>
            </div>
            <div class="share">
              <?php $link = base_url(uri_string()); ?>
              <a class="fa fa-facebook facebook-icon social-icon-x2 rounded" href="https://www.facebook.com/sharer/sharer.php?u=<?=$link?>"></a>
              <a class="fa fa-twitter twitter-icon social-icon-x2 rounded" href="https://twitter.com/intent/tweet?url=<?=$link?>"></a>
              <a class="fa fa-linkedin linkedin-icon social-icon-x2 rounded" href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$link?>"></a>
            </div>
          </div>
          <div class="col-md-12">
            <a data-fancybox="article" data-caption="<?=$article->article_title?>" href="<?=site_url("uploads/img/article/$article->image_name")?>">
              <img class="img-responsive" src="<?=site_url("uploads/img/article/$article->image_name")?>" alt="">
            </a>
          </div>
          <div class="col-md-12 text-justify">
            <?=$article->article_desc?>
          </div>
					<div class="col-md-12 this-tag">
						<?php $extag = explode(',', $article->article_tag); ?>
						<?php foreach ($extag as $tag): ?>
							<a href="<?=site_url('berita-event?tag='.strtolower(str_replace(' ', '', $tag)))?>">
								<span><?=$tag?></span>
							</a>
						<?php endforeach; ?>
					</div>
			</div>
			<div class="col-md-3">
				<div class="oth-artikel">
					<h3>ARTIKEL LAINNYA</h3>
					<?php foreach ($others as $other): ?>
						<p><a href="<?=site_url('berita-event/'.$other->article_link)?>"><?=$other->article_title?></a></p>
					<?php endforeach; ?>
				</div>
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
