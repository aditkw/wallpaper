<?php
include "header.php";
// echo flashMessage("alert_payment");
?>

<section id="slider">
	<ul class="ul bxslider">
        <?php for ($i=0; $i < 4; $i++) :?>
        	<li>
                <a target="_blank" href="#">
                    <img class="img" src="<?=$abs?>/asset/images/slider/slider-63565-33453-80966.jpg" alt="slider-63565-33453-80966.jpg">
                </a>
            </li>
        <?php endfor ?>
    </ul>
</section>

<section id="banner">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="box-banner">
                	<div class="item-banner banner-main">
                    	<div class="box-banner">
                        	<div class="item-banner">
                            	<a href="#">
                                    <img class="img" src="<?=$abs?>/asset/images/banner/thumb/5004-banner-.jpg" alt="5004-banner-.jpg">
                                </a>
                            </div>
                            <div class="item-banner">
                                <a href="#">
                                    <img class="img" src="<?=$abs?>/asset/images/banner/thumb/5004-banner-.jpg" alt="5004-banner-.jpg">
                                </a>
                            </div>
                        </div>
                        
                        <div class="box-banner">
                        	<div class="item-banner-full">
                            	<a href="#">
                                    <img class="img" src="<?=$abs?>/asset/images/banner/thumb/50427-banner-.jpg" alt="5004-banner-.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item-banner banner-main">
                    	<div class="box-banner">
                        	<div class="item-banner">
                            	<div class="box-banner">
                                	<div class="item-banner-full">
                                    	<a href="#">
                                            <img class="img" src="<?=$abs?>/asset/images/banner/thumb/96810-banner-.jpg" alt="5004-banner-.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="item-banner">
                            	<div class="box-banner">
                                	<div class="item-banner-full">
                                    	<a href="<?=$bn4['link']?>">
                                        	<img class="img" src="<?=$abs?>/asset/images/banner/thumb/5004-banner-.jpg" alt="5004-banner-.jpg">
                                        </a>
                                    </div>
                                    <div class="item-banner-full">
                                        <a href="<?=$bn4['link']?>">
                                            <img class="img" src="<?=$abs?>/asset/images/banner/thumb/5004-banner-.jpg" alt="5004-banner-.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-banner -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#banner -->

<section id="best-seller">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="tag-konten">
                	<div class="nama-tag-konten">BEST SELLER</div>
                </div><!-- /.tag-konten -->
                
                <div class="box-bestpro owl-bestpro">
                    <?php for ($i=0; $i < 7; $i++) :?>
                    	<div class="item-bestpro">
                        	<a href="<?=$abs?>/produk-detail.php">
                        		<img class="img" src="<?=$abs?>/asset/images/produk/thumb/20131203111524.jpg" alt="20131203111524.jpg">
                            </a>
                            <div class="judul-bestpro"><a href="<?=$abs?>/produk-detail.php">2 TB External HDD</a></div>
                            <div class="kat-bestpro">HardDisk</div>
                            <div class="harga-bestpro">Rp. 1.225.000</div>
                            <div class="item-cart-bestpro">
                                <a class="btn-beli" href="#">
                                    BELI
                                </a>
                                <a class="btn-viewpro pull-right" href="<?=$abs?>/produk-detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    <?php endfor ?>
                </div><!-- /.box-bestpro -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#best-seller -->

<section id="banner-second">
	<a href="#">
    	<img class="img" src="<?=$abs?>/asset/images/banner/thumb/92126-banner-.jpg" alt="92126-banner-.jpg">
    </a>
</section>

<section id="populer-pro">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="tag-konten">
                	<div class="nama-tag-konten">PALING DICARI</div>
                </div><!-- /.tag-konten -->
                
                <div class="box-pro">
                    <?php for ($i=0; $i < 15; $i++) :?>
                    	<div class="item-pro">
                        	<a href="<?=$abs?>/produk-detail.php">
                                <img class="img" src="<?=$abs?>/asset/images/produk/thumb/20131203111524.jpg" alt="20131203111524.jpg">
                            </a>
                            <div class="judul-pro"><a href="<?=$abs?>/produk-detail.php">Erakomp Products</a></div>
                            <div class="kat-pro">Category Products</div>
                            <div class="harga-pro">Rp. 990.000</div>
                            <div class="item-cart-pro">
                            	<a class="btn-beli" href="#">BELI</a>
                                <a class="btn-viewpro pull-right" href="<?=$abs?>/produk-detail.php"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    <?php endfor ?>
                </div><!-- /.box-bestpro -->
                
                <div class="banner-tiga">
                	<a href="#"><img class="img" src="<?=$abs?>/asset/images/banner/thumb/73101-banner-.jpg" alt="73101-banner-.jpg"></a>
                </div><!-- banner-tiga -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#best-seller -->

<section id="berita-home">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="tag-konten">
                	<div class="nama-tag-konten">BERITA KOMPUTER</div>
                </div><!-- /.tag-konten -->
                
                <div class="box-berita">
                <?php for ($i=0; $i < 2; $i++) :?>
                	<div class="item-berita">
                    	<div class="konten-item-berita">
                        	<div class="img-berita">
                            	<a href="#">
                                	<img class="img" src="<?=$abs?>/asset/images/news/thumb/20130131021107.jpg" alt="<?=$br['judul']?>">
                                </a>
                                <div class="tgl-berita">
                               		<div class="num-berita"><?=date("d")?></div>
                                    <div class="bul-berita"><?=date("M")?></div>
                                </div>
                            </div><!-- /.img-berita -->
                            <div class="judul-item-berita"><a href="#">Erakomp News</a></div>
                            <div class="subisi-item-berita">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </div>
                            <a class="btn-berita" href="#">Selengkapnya</a>
                        </div>
                    </div>
                <?php endfor ?>
                </div><!-- /.box-berita -->
            </div><!-- /.col -->
        </div><!-- .row -->
    </div><!-- /.container -->
</section><!-- /#berita-home -->

<section id="testi-home">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="box-testi-home">
                	<div class="tag-testi-home">TESTIMONIAL</div>
                    <div class="owl-testi">
						<?php for ($i=0; $i < 5; $i++) :?>
                            <div class="item-testi-home">
                                <div class="isi-testi-home">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                        	</div>
                        <?php endfor ?>
                    </div><!-- /.owl-testi -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#testi-home -->

<?php include "footer.php"; ?>