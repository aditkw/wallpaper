<section id="status-order">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-md-offset-3">
            	<div class="form-status-order">
                <form name="form-cari-trans" action="<?=$abs?>/review-pesanan-anda.html" method="post">
                	<div class="input-group">
                    	<span class="input-group-addon hidden-320">Cek Order Anda</span>
                        <input type="text" class="form-control" name="notrans" placeholder="No. Transaksi" required>
                        <span class="input-group-btn">
                        	<button class="btn btn-default" type="submit" name="kirim">Cari</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
                </div><!-- /.form-status-order -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#status-order -->

<section id="konten-footer">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="box-info-footer">
                	<div class="nama-pt">PT. Erakomp Infonusa</div>
                    <div class="row">
                    	<div class="col-sm-6">
                        	<div class="item-alamat">
                            	<div class="subitem-alamat">
                                    Office Tower 88 Kota Kasablanka <br>
                                    Lt. 20, Unit D - E <br>
                                    Jl. Casablanca Kav. 88 <br>
                                    Jakarta Selatan 12870, Indonesia 
                                </div><br>
                                <div class="subitem-alamat">P. 0810-0098-7765</div>
                                <div class="subitem-alamat">F. 021-5656545</div>
                                <div class="subitem-alamat">E. info@erakomp.com</div>
                            </div>
                            <div class="histast" style="margin-top:20px;">
                            <!-- Histats.com  START  (standard)-->
							<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                            <a href="http://www.histats.com" target="_blank" title="page hit counter" ><script  type="text/javascript" >
                            try {Histats.start(1,2216982,4,8,210,40,"00011111");
                            Histats.track_hits();} catch(err){};
                            </script></a>
                            <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2216982&101" alt="page hit counter" border="0"></a></noscript>
                            <!-- Histats.com  END  -->
                            </div><!-- /.histats -->
                        </div>
                        <div class="col-sm-6">
                        	<div class="item-alamat">
                            	<div class="subitem-alamat">Support :</div>
                                <div class="subitem-alamat">Jl Daan Mogot Km 84 No 90 B</div>
                                <div class="subitem-alamat">P. 0810-0098-7765</div>
                                <div class="subitem-alamat">F. 021-5656545</div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-info-footer -->
            </div><!-- /.col -->
            
            <div class="col-md-6">
            	<div class="box-menu-footer">
                	<div class="item-menu-footer">
                    	<div class="tag-menu-footer">Navigasi</div>
                        <ul class="ul menu-footer">
                        	<li><a href="<?=$abs?>/profile">Tentang Kami</a></li>
                            <li><a href="<?=$abs?>/produk.html">Produk</a></li>
                            <li><a href="<?=$abs?>/testimonial.html">Testimonial</a></li>
                            <li><a href="<?=$abs?>/berita-seputar-komputer.html">Berita Komputer</a></li>
                        </ul>
                    </div><!-- /.item-menu-footer -->
                    
                    <div class="item-menu-footer">
                    	<div class="tag-menu-footer">Informasi</div>
                        <ul class="ul menu-footer">
                        	<li><a href="<?=$abs?>/cara-order.html">Cara Order</a></li>
                            <li><a href="<?=$abs?>/service-center.html">Service Center</a></li>
                            <li><a href="<?=$abs?>/syarat-dan-ketentuan.html">Syarat Ketentuan</a></li>
                            <li><a href="<?=$abs?>/hubungi-kami.html">Hubungi Kami</a></li>
                        </ul>
                    </div><!-- /.item-menu-footer -->
                    
                    <div class="item-menu-footer">
                    	<div class="tag-menu-footer">Akun Saya</div>
                        <ul class="ul menu-footer">
                        	<li><a href="<?=$abs?>">Login</a></li>
                            <li><a href="<?=$abs?>/keranjang-belanja.html">keranjang Belanja</a></li>
                            <li><a href="<?=$abs?>/konfirmasi-transfer.html">Konfirmasi Transfer</a></li>
                        </ul>
                    </div><!-- /.item-menu-footer -->
                </div><!-- /.box-menu-footer -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /#konten-footer -->

<footer>
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="copyright">Copyright &copy; 2016 Erakomp  - All rights reserved. Designed By <a target="_blank" href="http://lawavedesign.com">Lavawedesign.com</a> - <a target="_blank" href="<?=$abs?>/disclaimer.php">Disclaimer</a></div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer>

<?php include "script.php"; ?>