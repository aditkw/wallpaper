<?php
include "header.php";
// $cekcartvalid  = cekCart($abs, "WHERE acak = '$_SESSION[ses_beli]'");
?>

<div class="map-halaman map-khusus">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<ol class="breadcrumb">
                    <li><a href="<?=$abs?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">Keranjang Belanja</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.map-halaman -->

<div id="konten">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
                <div class="box-keranjang">
                <form name="form-keranjang" action="<?=$abs?>/proses/do_update_cart.php?act=up" method="post">
                	<input type="hidden" name="link" value="<?=$abs3?>">
                    <div class="table-responsive">
                        <table class="table tbl-keranjang">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Item Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center" width="120">Jumlah</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" width="130">
                                        <img src="<?=$abs?>/asset/images/produk/thumb/20131203111524.jpg" width="100%">
                                    </td>
                                    <td class="vmiddle">
                                        <a class="cart-nama-pro" target="_blank" href="<?=$abs?>/produk.php">Nama Produk</a>
                                        <div class="detil-pro">
                                            Kategori, Merk
                                        </div>
                                    </td>
                                    <td class="text-center vmiddle">Rp. 990.000</td>
                                    <td class="text-center vmiddle">
                                        <input type="hidden" name="id[]" value="">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control text-center" name="jumlah[]" min="1" value="1">
                                        </div><!-- /input-group -->
                                    </td>
                                    <td class="text-center vmiddle"><strong>Rp. 990.000</strong></td>
                                    <td class="text-center vmiddle">
                                        <a class="btn btn-danger" href="<?=$abs?>/proses/do_cart.php?act=del&d=<?=$q['id_order']?>" onClick="return hapus()">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    
                    <div class="detail-bayar">
                        <table>
                            <tr>
                                <td class="text-right">Total Belanja</td>
                                <td class="text-right" width="150"><strong>Rp. 990.000</strong></td>
                            </tr>
                            <tr>
                                <td class="text-right">Ongkos Kirim</td>
                                <td class="text-right"><strong>On Process</strong></td>
                            </tr>
                            <tr>
                                <td class="text-right" style="padding-bottom:15px !important;">Total Pembayaran</td>
                                <td class="text-right" style="padding-bottom:15px !important;"><strong>Rp. 990.000</strong></td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="2">                                    
                                    <button class="btn btn-primary btn-checkout text-uppercase" type="submit" name="update">Update Cart</button>
                                    <a class="btn btn-success btn-checkout text-uppercase" href="<?=$abs?>/keranjang-checkout.php">Checkout</a>
                                </th>
                            </tr>
                        </table>
                    </div><!-- /.detail-barang -->
                </form>
                </div><!-- /.box-keranjang -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#koneten-home -->

<div class="modal fade modal-lwd" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
        <form name="forhubagen" action="proses/do_testimoni.php?act=ins" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="urel" value="<?=$abs?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Insert Testimoni</h4>
            </div>
            <div class="modal-body">
            	<div class="form-group">
                	<label>Nama Lengkap</label>
                	<input class="form-control" type="text" name="nama" required />
                </div>
                <div class="form-group">
                    <label>Isi Testimoni</label>
                    <textarea class="form-control" name="isi" required></textarea>
                </div>
            </div><!-- /.modal-body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div><!-- /.modal -->

<?php include "footer.php"; ?>