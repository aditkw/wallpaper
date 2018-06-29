<?php
include "header.php";
?>

<div class="map-halaman map-khusus">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<ol class="breadcrumb">
                    <li><a href="<?=$abs?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Informasi Pengiriman</li>
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
                	<h2 class="tag-page">Informasi Pengiriman</h2>
                    <div class="box-cart">
                        <form class="form-horizontal" name="form-pengiriman" action="<?=$abs?>/pilih-pengiriman.html" method="post">
                        	<input type="hidden" name="urel" value="">
                            <input type="hidden" name="notrans" value="" />
                            <input type="hidden" name="idmember" value="" >
                            <input type="hidden" name="total" value="" >
                            <input type="hidden" name="berat" value="" >
                            
                            <div class="form-group">
                                <label class="col-md-3  control-label">Nama Lengkap <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nama" value=" " placeholder="Nama Depan" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Telepon / Hp <span class="required">*</span></label>
                                <div class="col-md-3">
                                	<input class="form-control" type="text" name="telp" value=" " placeholder="Nomor Telepon / Hp" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                                <div class="col-md-4">
                                	<input class="form-control" type="email" name="email" value=" " placeholder="Alamat Email" required>
                                </div>
                            </div>
                            
                            <div class="form-group"></div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Alamat Lengkap <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" required></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Provinsi <span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" name="provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kota <span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" id="kota" name="kota" required>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kecamatan <span class="required">*</span></label>
                                <div class="col-md-3">
                                    <select class="form-control" id="kecamatan" name="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group"></div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Catatan anda</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="catatan" placeholder="Tambahkan catatan anda"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group"></div>
                            
                            <div class="form-group">
                            	<label class="col-md-3"></label>
                                <div class="col-md-6">
                                	<button class="btn btn-success btn-checkout text-uppercase" type="submit" name="kirim">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-cart -->
                </div><!-- /.box-content -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#koneten-home -->

<?php include "footer.php"; ?>