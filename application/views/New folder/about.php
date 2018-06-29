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
                    <li class="active">Tentang Kami</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.map-halaman -->

<section id="konten">
	<div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="konten-about">
                	<div class="row">
                    	<div class="col-md-9">
                        	<div class="box-about">
                            	<h2 class="tag-page">Tentang Kami</h2>
                                <div class="img-about"><img class="img" src="<?=$abs?>/asset/images/other/<?=$in['foto']?>" alt="Erakomp.com"></div>
                                <div class="isi-about"><?=$in['isi']?></div>
                            </div><!-- /.box-about -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3">
                      		<?php include "sidebar-berita.php"; ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.konten-about -->
    		</div><!-- /.col -->
    	</div><!-- /.row -->
    </div><!-- /.container -->
</section>

<?php include "footer.php"; ?>