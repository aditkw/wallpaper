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
                            <?php for ($i=0; $i < 10; $i++) :?>
                                <div class="list-berita">
                                	<div class="row">
                                    	<div class="col-sm-4">
                                        	<div class="img-list-berita">
                                            	<a href="<?=$link_berita?>">
                                            		<img class="img" src="<?=$abs?>/asset/images/news/thumb/20130131014819.jpg">
                                                </a>
                                            </div><!-- /.img-list-berita -->
                                        </div><!-- /.col -->
                                        <div class="col-md-8">
                                        	<div class="konten-list-berita">
                                        		<div class="jud-list-berita">
                                                	<a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</a>
                                                </div>
                                                <div class="tgl-list-berita">Sunday, 21 June 2015 09:00 WIB</div>
                                                <div class="subisi-list-berita">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. </div>
                                            </div><!-- /.konten-list-berita -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /.list-berita -->
                            <?php endfor ?>
                            </div><!-- /.box-list-berita -->
                            
                            <div class="box-page text-right">
								<ul class="pagination">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div><!-- /.page -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3">
                        	<?php include "sidebar-berita.php"; ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.konten-produk -->
    		</div><!-- /.col -->
    	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<?php include "footer.php"; ?>