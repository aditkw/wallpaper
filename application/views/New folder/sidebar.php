<div class="sidebar-produk">
	<div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                   		Berdasarkan Merk
                    </a>
                </h4>
            </div><!-- /.panel-heading -->
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                	<ul class="ul sidebar-menu">
                    <?php for ($i=0; $i < 12; $i++) :?>
                    	<li><a href="#">Merk</a></li>
                    <?php endfor ?>
                    </ul><!-- /.sidebar-menu -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel-collapse -->
        </div><!-- /.panel -->
    
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
                        <?php for ($i=0; $i < 8; $i++) :?>
                        	<li><a href="#">Category</a></li>
                        <?php endfor ?>
                    </ul><!-- /.sidebar-menu -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel-collapse -->
    	</div><!-- /.panel -->
    </div><!-- /.panel-group -->
    
    <div class="banner-tanya">
    	<a href="#">
            <img class="img" src="<?=$abs?>/asset/images/banner/thumb/50677-banner-.jpg" alt="50677-banner-.jpg">
        </a>
    </div><!-- /.banner-tanya -->
</div><!-- /.sidebar -->