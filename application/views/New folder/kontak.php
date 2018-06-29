<?php include "header.php"; ?>

<div class="map-halaman map-khusus">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<ol class="breadcrumb">
                    <li><a href="<?=$abs?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Hubungi Kami</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="box-content">
                    <div class="row">
                    	<div class="col-md-12">
                        	<h2 class="tag-page">Hubungi Kami</h2>
                       		<div class="box-kontak">
							<?php
                                // if(isset($_POST['status'])){
                                //     if($_POST['status']=='1'){ $alert = "success"; }else{ $alert = "danger"; }
                                //     echo "<div class='alert alert-".$alert."'>".$_POST['msg']."</div>";
                                // }
                            ?>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="box-form">
                                    <form name="form-kontak" action="<?=$abs?>/sendmail.php" method="post">
                                        <input type="hidden" name="urel" value="<?=$abs?>" />
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="has-feedback">
                                                <input class="form-control" type="text" name="nama" value="" placeholder="Name" required />
                                                <span class="glyphicon glyphicon-user form-control-feedback text-abu"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Telphone</label>
                                                    <div class="has-feedback">
                                                        <input class="form-control with-border" type="text" name="telp" value="" placeholder="Telphone" required />
                                                        <span class="glyphicon glyphicon-phone form-control-feedback text-abu"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <div class="has-feedback">
                                                        <input class="form-control with-border" type="email" name="email" value="" placeholder="Email" />
                                                        <span class="glyphicon glyphicon-envelope form-control-feedback text-abu"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                        
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control with-border" name="pesan" rows="4" placeholder="Type message here..." required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input class="btn btn-success btn-kontak" type="submit" value="Send Message" />
                                        </div>
                                    </form>
                                    </div><!-- /.box-form -->
                                </div><!-- /.col -->
                                
                                <div class="col-md-4">
                                    <div class="box-alamat">
                                        <div class="tag-kontak">Contact Information</div>
                                        <div class="subtag-kontak">For further information, please contact us.</div>
                                        <div class="item-kontak">
                                            <div class="tag-item-kontak">Alamat</div>
                                            <div class="isi-item-kontak">
                                                Office Tower 88 Kota Kasablanka <br>
                                                Lt. 20, Unit D - E <br>
                                                Jl. Casablanca Kav. 88 <br>
                                                Jakarta Selatan 12870, Indonesia 
                                            </div>
                                        </div><!-- /.item-kontak -->
                                        <div class="item-kontak">
                                            <div class="tag-item-kontak">Telphone</div>
                                            <div class="isi-item-kontak">0810-0098-7765</div>
                                        </div><!-- /.item-kontak -->
                                        <div class="item-kontak">
                                            <div class="tag-item-kontak">Fax</div>
                                            <div class="isi-item-kontak">021-5656545</div>
                                        </div><!-- /.item-kontak -->
                                        <div class="item-kontak">
                                            <div class="tag-item-kontak">Email</div>
                                            <div class="isi-item-kontak">info@erakomp.com</div>
                                        </div><!-- /.item-kontak -->
                                    </div><!-- /.box-alamat -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.box-kontak -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-content -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#koneten-home -->

<div class="peta">
	<div class="peta">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d253839.16048339978!2d106.78870879192469!3d-6.232472163833283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1487841478424" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
     </div><!-- /.peta -->
</div><!-- /.peta -->

<?php include "footer.php"; ?>