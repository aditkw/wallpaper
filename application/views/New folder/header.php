<?php
include "meta.php";

?>

<header>
	<div class="top-header visible-lg visible-md">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<ul class="ul menu-top-header pull-left">
                    	<li><a href="#"><i class="fa fa-clock-o"></i> Mod - Sun : 9.00 - 18.00</a></li>
                        <li><a href="mailto:sales@erakomp.com"><i class="fa fa-envelope"></i> sales@erakomp.com</a></li>
                    </ul>
                    <ul class="ul menu-top-header pull-right">
                    	<li><a href="<?=$abs?>/registrasi-member.html"><i class="fa fa-edit"></i> Register</a></li>
                        <li><a href="<?=$abs?>/login-member.html"><i class="fa fa-lock"></i> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- /.top-header -->
    
    <!-- Top Header Responsive -->
    <div class="top-header-rs hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header-rs pointer">
                        <div class="ikon-bar">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div><!-- /.ikon-bar -->
                    </div><!-- /.box-header-rs -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.top-header-rs -->
    <!-- Top Header Responsive -->
    
    <div class="konten-header">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="tbl-header">
                    	<div class="tr-header">
                        	<div class="td-header logo">
                            	<a href="<?=$abs?>"><img src="<?=$abs?>/asset/images/icon/logo.jpg" alt="Erakomp"></a>
                            </div>
                            <div class="td-header menu hidden-sm hidden-xs">
                            	<ul class="ul">
                                	<li><a href="<?=$abs?>">Home</a></li>
                                    <li><a href="<?=$abs?>/produk.php">Produk</a></li>
                                    <li><a href="<?=$abs?>/berita.php">Berita</a></li>
                                    <li><a href="<?=$abs?>/kontak.php">Hubungi Kami</a></li>
                                    <li><a href="http://www.erakomp.com/profile/">Tentang Kami</a></li>
                                </ul>
                            </div>
                            <div class="td-header telepon hidden-sm hidden-xs"><i class="fa fa-phone"></i> 021 - 8064 0799</div>
                        </div><!-- /.tr-header -->
                	</div><!-- /.tbl-header -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.konten-header -->
    
    <div class="konten-item-header">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="konten-menu">
                    	<div class="tbl-header">
                        	<div class="tr-header bg-tr-header">
                            	<div class="td-header kategori-menu">
                                	<div class="box-kategori-menu" id="barkat"><i class="fa fa-bars"></i> <span class="hidden-sm hidden-xs">KATEGORI PRODUK</span></div>
                                    <ul class="ul menu-topbar">
                                        <?php for ($i=0; $i < 10; $i++) :?>
                                        <li>
                                            <a href="#">
                                                Kategori Produk 
                                                <i class="fa fa-angle-right pull-right"></i> 
                                            </a>
                                        </li>
                                        <?php endfor?>
                                    </ul>
                                </div><!-- /.td-header -->
                                
                                <div class="td-header form-search">
                                	<div class="box-form-search">
                                    	<form name="form-pencarian" action="<?=$abs?>/proses/do_cari.php?act=cari" method="post">
                                        	<input type="hidden" name="urel" value="<?=$abs?>">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" name="cari" placeholder="Cari Produk..." required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div>
                                </div><!-- /.td-header -->
                                
                                <div class="td-header cart-menu">
                                	<div class="box-cart-menu">
                                    	<a href="<?=$abs?>/keranjang.php">
                                        	<div class="ikon-cart"><i class="fa fa-shopping-cart"></i></div>
                                            <span class="hidden-sm hidden-xs"> Keranjang Belanja : 0 item(s)</span>
                                        </a>
                                    </div><!-- /.box-cart-menu -->
                                </div><!-- /.td-header -->
                            </div><!-- /.tr-header -->
                        </div><!-- /.tbl-header -->
                    </div><!-- /.konten-menu -->
            	</div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.konten-item-header -->
</header>

<div id="side-menu">
	<div class="tag-side-menu" id="side-menu-close">MENU <i class="fa fa-angle-double-left pull-right"></i></div>
    <ul class="info-side-menu">
    	<li><a href="#"><i class="fa fa-clock-o"></i> Mod - Sun : 9.00 - 18.00</a></li>
        <li><a href="mailto:<?=$kon['email']?>"><i class="fa fa-envelope"></i> <?=$kon['email']?></a></li>
        <li><a href="#"><i class="fa fa-phone"></i> <?=$kon['telp']?></a></li>
    </ul>
    
    <ul class="list-side-menu">
        
        <li><a href="<?=$abs?>">Home</a></li>
        <li><a href="<?=$abs?>/produk.html">Produk</a></li>
        <li><a href="<?=$abs?>/berita-seputar-komputer.html">Berita</a></li>
        <li><a href="<?=$abs?>/hubungi-kami.html">Hubungi Kami</a></li>
        <li><a href="<?=$abs?>/profile">Tentang Kami</a></li>
        <li><a href="<?=$abs?>/cara-order.html">Cara Order</a></li>
        <li><a href="<?=$abs?>/sayarat-dan-ketentuan.html">Syarat Ketentuan</a></li>
    	<li><a href="<?=$abs?>/konfirmasi-transfer.html">Konfirmasi Transfer</a></li>
        <?php if($valid == "valid"){ ?>
        <li><a><i class="fa fa-user"></i> Welcome <?=$rm['nama']?></a></li>
        <li><a href="<?=$abs?>/logout.php?act=logout&r=<?=$abs?>&d=a1l2q3p4z5m6"><i class="fa fa-sign-in"></i> Logout</a></li>
        <?php }else{ ?>
        <li><a href="<?=$abs?>/registrasi-member.html"><i class="fa fa-user"></i> Register</a></li>
        <li><a href="<?=$abs?>/login-member.html"><i class="fa fa-sign-in"></i> Login</a></li>
        <?php } ?>
    </ul><!-- /.list-side-menu -->
</div><!-- /#side-menu -->