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
                    <li><a href="<?=$abs?>">Produk</a></li>
                    <li><a href="<?=$link_mapkat?>">Kategori</a></li>
                    <li class="active">Nama Produk</li>
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
                	<div class="produk-detail">
                    	<div class="row">
                        	<div class="col-md-5">
                            	<h2 class="nama-produk-res hidden-lg hidden-md">Nama Produk</h2>
                            	<div class="img-produk">
                                	<img class="img" src="<?=$abs?>/asset/images/produk/20131203111524.jpg">
                                </div>
                            </div><!-- /.col -->
                            <div class="col-md-7">
                            	<div class="detail-pro">
                                	<h2 class="nama-produk visible-lg visible-md">Nama Produk</h2>
                                    <div class="box-katpro">
                                    	<table>
                                        	<tr>
                                            	<td><strong>Kategori</strong></td><td>:</td><td>Nama Kategori</td>
                                            </tr>
                                            <tr>
                                            	<td><strong>Merk</strong></td><td>:</td><td>nama Merk</td>
                                            </tr>
                                        </table>
                                        <div class="label-stok">In Stock</div>
                                    </div><!-- /.box-katpro -->
                                    
                                    <div class="item-detail-pro">
                                    	<div class="subisi-produk">-</div>
                                        <div class="harga-produk">RP. 990.000</div>
                                    </div><!-- /.item-detail-pro -->
                                    
                                    <form name="form-cart" action="<?=$abs?>/proses/do_cart.php?act=inp" method="post">
                                    <input type="hidden" name="id" value="">
                                    <input type="hidden" name="urel" value="<?=$abs3?>">
                                    <input id="jum" type="hidden" name="jumlah_old" value="1">
                                    <div class="box-qty-pro clearfix">
                                    	<div class="qty-left pull-left">
                                        	<div class="input-group input-group-sm">
                                            	<span class="input-group-addon">Quantity</span>
                                            	<span class="input-group-btn">
                                                	<button class="btn btn-default" type="button" onClick="kurang()"><i class="fa fa-minus"></i></button>
                                                </span>
                                                <input type="text" class="form-control text-center" id="qty" name="jumlah" value="1" required>
                                                <span class="input-group-btn">
                                                	<button class="btn btn-default" type="button" onClick="tambah()"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="qty-right pull-right">
                                        	<ul class="ul share-sosmed">
                                            	<li>
                                                	<a target="_blank" href="http://twitter.com/share?url=<?=$abs3?>&text=<?=$q['nama']?>" onclick="window.open(this.href,'Twit','height=400,width=530,scrollbars=yes'); return false;" title="<?=$q['nama']?>">
                                                    	<i class="fa fa-twitter twt"></i> Tweet
                                                    </a>
                                                </li>
                                                <li>
                                                	<a href="http://www.facebook.com/sharer.php?u=<?=$abs3?>" onclick="window.open(this.href,'shared', 'height=400,width=530,scrollbars=yes'); return false;" title="<?=$q['nama']?>">
                                                    	<i class="fa fa-facebook fb"></i> Share
                                                    </a>
                                                </li>
                                                <li>
                                                	<a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?=$abs3?>" onclick="window.open(this.href,'shared','height=400,width=530,scrollbars=yes'); return false;">
                                                    	<i class="fa fa-google-plus gp"></i> Google+
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.box-qty-pro -->
                                    
                                    <button class="btn-beli-pro" type="submit" name="kirim"><i class="fa fa-shopping-cart"></i> BELI</button>
                                    </form>
                                </div><!-- /.detail-pro -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        
                        <div class="box-deskripsi">
                        	<div class="tag-deskripsi">DESKRIPSI</div>
                            <div class="isi-deskripsi">
                                <table cellpadding="3" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td><strong>Platform</strong></td>
                                            <td>Colour Laser&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Metode Cetak</strong></td>
                                            <td>Laser&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Teknologi Cetak</strong></td>
                                            <td>4-pass color laser&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Maks. Besaran Kertas</strong></td>
                                            <td>A4&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Maks. Resolusi</strong></td>
                                            <td>600&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Effective Print Resolution</strong></td>
                                            <td>Up to 600 x 600 dpi&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecepatan Cetak B/W</strong></td>
                                            <td>16 ppm&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kecepatan Cetak Warna</strong></td>
                                            <td>4 ppm&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Konektivitas</strong></td>
                                            <td>USB&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Prosessor</strong></td>
                                            <td>266 MHz&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Memori Standar</strong></td>
                                            <td>8 MB DRAM, 2 MB Flash&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Maks. Memori</strong></td>
                                            <td>8 MB DRAM, 2 MB Flash&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bahasa</strong></td>
                                            <td>Host-based&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Input Tray #1</strong></td>
                                            <td>150 sheets&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Media</strong></td>
                                            <td>Paper (bond, brochure, color, glossy, letterhead, photo, plain, preprinted, prepunched, recycled, rough), transparencies, labels, envelopes, cardstock&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Compatible Media Sizes</strong></td>
                                            <td>A4, A5, A6, B5 (ISO, JIS), 8k, 16k, 10 x 15 cm, postcards (JIS single and double); envelopes (DL, C5, B5); custom: 76 x 127 to 216 x 356 mm&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Power Consumption</strong></td>
                                            <td>
                                            <ul>
                                                <li>active: 295 watts&nbsp;&nbsp;</li>
                                                <li>sleep: 3.1 watts&nbsp;&nbsp;</li>
                                                <li>standby: 8 watts&nbsp;&nbsp;</li>
                                                <li>manual-off: 0.2 watts&nbsp;&nbsp;</li>
                                            </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dimensi</strong></td>
                                            <td>
                                            <ul>
                                                <li><strong>Dimensi Kemasan</strong>&nbsp;: 498 x 298 x 387 mm&nbsp;&nbsp;</li>
                                                <li><strong>Dimensi Produk</strong>&nbsp;: 400 x 402 x 223 mm&nbsp;&nbsp;</li>
                                            </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Berat</strong></td>
                                            <td>12.1 kg&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Consumables</strong></td>
                                            <td>
                                            <ul>
                                                <li>Black Toner 126A [CE310A]&nbsp;&nbsp;</li>
                                                <li>Cyan Toner 126A [CE311A]&nbsp;&nbsp;</li>
                                                <li>Yellow Toner 126A [CE312A]&nbsp;&nbsp;</li>
                                                <li>Magenta Toner 126A [CE313A]&nbsp;&nbsp;</li>
                                            </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.box-deskripsi -->
                    </div><!-- /.produk-detail -->
                </div><!-- /.konten-produk -->
    		</div><!-- /.col -->
    	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section id="best-seller">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tag-konten">
                    <div class="nama-tag-konten">PRODUK TERKAIT</div>
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

<script type="text/javascript">
	function tambah()
	{
		var qty = document.getElementById("qty").value;
		
		if(qty >= <?=$q['stok']?>){
			var hasil = <?=$q['stok']?>;
		}else{
			var hasil = eval(qty)+1;
		}
		document.getElementById("qty").value = hasil;
		//document.getElementById("jum").value = hasil;
	}
	
	function kurang()
	{
		var qty = document.getElementById("qty").value;
		
		if(qty > 1)
		{
			var hasil = eval(qty)-1;
		}
		else
		{
			var hasil = 1;
		}
		
		document.getElementById("qty").value = hasil;
		//document.getElementById("jum").value = hasil;
	}
</script>

<?php include "footer.php"; ?>