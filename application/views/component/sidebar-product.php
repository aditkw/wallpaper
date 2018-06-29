<div class="sidebar-produk">
	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						Berdasarkan Produk
					</a>
				</h4>
			</div><!-- /.panel-heading -->
			<div id="collapseTwo" class="panel-collapse collapse in ">
				<div class="panel-body">
					<ul class="ul sidebar-menu">
						<?php foreach ($side_category as $side_category): ?>
							<li><a href="<?php echo site_url('produk/kategori/'.$side_category->category_link); ?>" title="<?php echo $side_category->category_name ?>"><?php echo $side_category->category_name ?></a></li>
						<?php endforeach ?>
					</ul><!-- /.sidebar-menu -->
				</div><!-- /.panel-body -->
			</div><!-- /.panel-collapse -->
		</div><!-- /.panel -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							Berdasarkan Merk
					</a>
				</h4>
			</div><!-- /.panel-heading -->
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">
					<ul class="ul sidebar-menu">
						<?php foreach ($side_brand as $side_brand): ?>
							<li>
								<a href="<?php echo '?brand='.$side_brand->brand_link ?>">
									<?php echo $side_brand->brand_name; ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul><!-- /.sidebar-menu -->
				</div><!-- /.panel-body -->
			</div><!-- /.panel-collapse -->
		</div><!-- /.panel -->
	</div><!-- /.panel-group -->
	
	<div class="banner-tanya">
		<a href="#">
			<!-- <img class="img" src="<?=$abs?>/asset/images/banner/thumb/50677-banner-.jpg" alt="50677-banner-.jpg"> -->
		</a>
	</div><!-- /.banner-tanya -->
</div><!-- /.sidebar -->	