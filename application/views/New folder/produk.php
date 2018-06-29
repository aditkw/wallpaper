<?php
include "header.php";
?>
<section id="bg-page">
	<img class="img" src="<?=$abs?>/asset/images/icon/bg-page.jpg" alt="Page Konten">
</section>

<div class="map-halaman">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<ol class="breadcrumb">
                    <li><a href="<?=$abs?>"><i class="fa fa-home"></i></a></li>
                    <li><a href="#">Produk</a></li>
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
                	<?php include "sidebar.php"; ?>
                    <div class="box-produk">
                    	<div class="tag-produk">Products</div>
                    	<div class="subtag-produk"></div>
                        <div class="page-top clearfix">
                        	<div class="halaman pull-left visible-lg visible-md">
                            	<div class="item-hal tag">Page</div>
                                <div class="item-hal">
                                	<select class="drop-hal" onChange="window.location=this.options[this.selectedIndex].value">
                                    <?php for($x = 1; $x <= 7; $x++) :?>
                                    	<option value="<?=$x?>.html"><?=$x?></option>
                                    <?php endfor ?>
                                    </select>
                                </div>
                                <div class="item-hal">of 7</div>
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
                                    	<option value="<?=$link_sort?>.html">default</option>
                                        <option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "terbaru"){echo "selected";}} ?> value="<?=$link_sort?>/terbaru.html">terbaru</option>
                                        <option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "terlama"){echo "selected";}} ?> value="<?=$link_sort?>/terlama.html">terlama</option>
                                        <option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "termurah"){echo "selected";}} ?> value="<?=$link_sort?>/termurah.html">termurah</option>
                                        <option <?php if(isset($_GET['sor'])){if($_GET['sor'] == "termahal"){echo "selected";}} ?> value="<?=$link_sort?>/termahal.html">termahal</option>
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
                            <?php for ($i=0; $i < 16; $i++) :?>
                                <div class="item-pro">
                                	<a href="<?=$abs?>/produk-detail.php">
                                    	<img class="img" src="<?=$abs?>/asset/images/produk/thumb/20131203111524.jpg" alt="20131203111524.jpg">
                                    </a>
                                    <div class="judul-pro"><a href="<?=$abs?>/produk-detail.php">Erakomp Products</a></div>
                                    <div class="kat-pro">Category</div>
                                    <div class="harga-pro">Rp. 990.000</div>
                                    <div class="item-cart-pro">
                                        <a class="btn-beli" href="#">BELI</a>
                                        <a class="btn-viewpro pull-right" href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div><!-- /.box-bestpro -->
                        
                        <div class='alert alert-danger text-center'><strong>Produk belum tersedia</strong></div>
                        <div class="box-page page-produk">
							
                            <ul class="pagination">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div><!-- /.page -->
                    </div><!-- /.box-produk -->
                </div><!-- /.konten-produk -->
    		</div><!-- /.col -->
    	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<?php include "footer.php"; ?>