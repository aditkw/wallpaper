<?php 
/* Cek uri segment*/
$uri_1 = $this->uri->segment(1);
$uri_2 = $this->uri->segment(2);
$uri_3 = $this->uri->segment(3);
?>
<section id="bg-page">
	<img class="img" src="<?php echo base_url('dist/img/assets/bg-page.jpg');?>" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>
						<!-- Jika uri 2 tersedia, maka breadcrumb menampilkan kategori -->
					<li class="active">Hasil Pencarian</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.map-halaman -->

<section id="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="konten-produk">
					<!-- Sidebar -->
					<?php $this->load->view('component/sidebar-product');?>
					<div class="box-produk">
						<div class="tag-produk">							
							Hasil Pencarian <?php echo $keys ?>
						</div>
						<div class="subtag-produk"></div>
						<div class="page-top clearfix">
							<div class="halaman pull-left visible-lg visible-md">
								<div class="item-hal tag">Page</div>
								<div class="item-hal">
									<select class="drop-hal" onChange="window.location=this.options[this.selectedIndex].value">
										<?php for($x = 1; $x <= $num_page; $x++) :?>
											<?php if ($uri_3 == NULL): ?>
												<option value="<?php echo site_url('produk/'.$x);?>" <?php if ($x == $on_page): ?> selected <?php endif ?>>
													<?=$x?>
												</option>
											<?php else: ?>
												<option value="<?php echo site_url('produk/kategori/'.$uri_3.'/'.$x);?>" <?php if ($x == $on_page): ?> selected <?php endif ?>>
													<?=$x?>
												</option>
											<?php endif ?>
										<?php endfor ?>
									</select>
								</div>
								<div class="item-hal">of <?php echo $num_page ?></div>
							</div>
							
							<div class="halaman pull-left hidden-lg hidden-md">
								<div class="item-hal">
									<button class="btn btn-info btn-sm target-menu-merk"><i class="fa fa-tags"></i> <span class="hidden-320">Berdasarkan</span> Merk</button>
								</div>
							</div>
							
							<div class="halaman pull-right">
								<div class="item-hal tag">Sort by :</div>
								<div class="item-hal">
									<select class="drop-hal" onChange="window.location=this.options[this.selectedIndex].value">
										<!-- <option value="<?=$link_sort?>.html">default</option>
										<option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "terbaru"){echo "selected";}} ?> value="<?=$link_sort?>/terbaru.html">terbaru</option>
										<option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "terlama"){echo "selected";}} ?> value="<?=$link_sort?>/terlama.html">terlama</option>
										<option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "termurah"){echo "selected";}} ?> value="<?=$link_sort?>/termurah.html">termurah</option>
										<option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "termahal"){echo "selected";}} ?> value="<?=$link_sort?>/termahal.html">termahal</option> -->
									</select>
								</div>
							</div>
							
							<div class="menu-merk">
								<ul class="ul">
									<?php for ($i=0; $i < 7; $i++) :?>
										<li><a href="#">Merk</a></li>
									<?php endfor ?>
								</ul>
							</div>
						</div><!-- /.page-top -->
						
						<div class="box-pro boxpro">
							<?php foreach ($product as $product): ?>
								<div class="item-pro">
									<a href="<?php echo site_url('produk/detail/'.$product->product_code.'/'.$product->product_link); ?>">
										<img class="img" src="<?php echo base_url('uploads/img/product/'.$product->image_name); ?>" alt="">
									</a>
									<div class="judul-pro"><a href="<?php echo site_url('produk/detail/'.$product->product_code.'/'.$product->product_link); ?>"><?php echo ucwords($product->product_name); ?></a></div>
									<div class="kat-pro"><?php echo ucwords($product->category_name); ?></div>
									<div class="harga-pro">Rp. <?php echo number_format($product->product_price); ?></div>
									<div class="item-cart-pro">
										<a class="btn-beli" href="#">BELI</a>
										<a class="btn-viewpro pull-right" href="#"><i class="fa fa-search"></i></a>
									</div>
								</div>
							<?php endforeach ?>
						</div><!-- /.box-bestpro -->
						<?php if ($num_rows < 1): ?>
							<div class='alert alert-danger text-center'><strong>Produk belum tersedia</strong></div>
						<?php endif ?>
						<div class="box-page page-produk">
							<?php echo $pagination; ?>
						</div><!-- /.page -->
					</div><!-- /.box-produk -->
				</div><!-- /.konten-produk -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

