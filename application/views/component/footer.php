<footer>
  <div class="subs-email relative">
    <div class="info">
      <p class="f-philo text-center text-putih">Sign Up For Newsletter</p>
      <p class="f-segoe text-center text-putih">Daftar & dapatkan update terbaru serta penawaran spesial.</p>
      <form id="subscribe" class="form-subs">
        <input type="email" name="subs" placeholder="Alamat email anda"><button id="btnSubscribe" type="submit">Subscribe</button>
      </form>
    </div>
    <div class="back-item"></div>
  </div>

  <div class="footer text-putih">
    <div class="container">
      <div class="row border-bot">
        <div class="col-md-3">
          <img class="max-width" src="<?=site_url('dist/img/assets/logo-foot.png')?>" alt="">
        </div>
        <div class="col-md-7 visible-lg visible-sm">
          <a class="text-putih" href="<?=site_url()?>">Beranda</a>
          <a class="text-putih" href="<?=site_url('tentang-kami')?>">Tentang Kami</a>
          <a class="text-putih" href="<?=site_url('produk/wallpaper')?>">Produk</a>
          <a class="text-putih" href="<?=site_url('#testi')?>">Testimonial</a>
          <a class="text-putih" href="<?=site_url('berita-event')?>">Berita/Event</a>
          <a class="text-putih" href="<?=site_url('hubungi-kami')?>">Hubungi Kami</a>
        </div>
        <div class="col-md-2">
          <div class="sosmed visible-lg">
            <a href="<?=$contact->contact_fb?>"><img src="<?=site_url('dist/img/assets/fb-ico.png')?>"></a>
            <a href="<?=$contact->contact_tw?>"><img src="<?=site_url('dist/img/assets/tw-ico.png')?>"></a>
            <a href="<?=$contact->contact_yt?>"><img src="<?=site_url('dist/img/assets/yt-ico.png')?>"></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-xs-6">
          <div class="row">
            <div class="col-md-12">
              <p><strong>INFORMASI KONTAK</strong></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p><strong>Kantor Pusat</strong></p>
              <p><?=nl2br($contact->contact_address)?></p>
              <!-- phone first -->
              <p class="text-gede no-margin"><strong><?=$contact->contact_phone?></strong></p>
              <!-- mail first -->
              <p><?=$contact->contact_email?></p>
            </div>
            <div class="col-md-6">
              <p><strong>Jam Operasi</strong></p>
              <p>
                 Weekdays 08:00 - 17:00 <br>
                 Weekend 09:00 - 15:00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-xs-6">
          <div class="row">
            <div class="col-md-12">
              <p><strong>AKUN SAYA</strong></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if ($member_access): ?>
                <p><a class="text-putih" href="<?=site_url('member-area')?>">Member Area</a></p>
              <?php else: ?>
                <p><a class="text-putih" href="<?=site_url('member-login')?>">Login</a></p>
              <?php endif; ?>
              <p><a class="text-putih" href="<?=site_url('keranjang')?>">Keranjang Belanja</a></p>
              <p><a class="text-putih" href="<?=site_url('konfirmasi')?>">Konfirmasi Pembayaran</a></p>
              <p><a class="text-putih" data-toggle="modal" href='#cekorder'>Cek Status Order</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-2 visible-lg">
          <div class="row">
            <div class="col-md-12">
              <p><strong>KATEGORI</strong></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php foreach ($categories as $category): ?>
              <p><a class="text-putih" href="<?=site_url('produk/'.$category->category_link)?>"><?=$category->category_name?></a></p>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="col-md-4 visible-lg">
          <div class="row">
            <div class="col-md-12">
              <p><strong>MERK</strong></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php foreach ($side_brand as $brand): ?>
              <p><a class="text-putih" href="<?=site_url('produk/'.$brand->category_link.'/'.$brand->brand_link)?>"><?=$brand->brand_name?></a></p>
              <?php endforeach; ?>
            </div>
            <div class="col-md-6">
              <?php foreach ($side_brand_off as $brand): ?>
                <p><a class="text-putih" href="<?=site_url('produk/'.$brand->category_link.'/'.$brand->brand_link)?>"><?=$brand->brand_name?></a></p>
              <?php endforeach; ?>
              <p><a class="text-putih" href="<?=site_url("product")?>">All Brands</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div style="margin-top: 5vh;" class="col-md-12">
          <p>Copyright © 2018 Wallpaper Indonesia - Designed & Powered by LawaveDesign.com - Disclaimer</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade" id="cekorder">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Cek status pesanan anda</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="testimoni">Nomor Pesanan</label>
            <input id="input_order" class="form-control" type="text" name="name" placeholder="masukan no pesanan" value="">
          </div>
          <div class="form-group">
            <a id="link_order" href=""><button type="button" class="btn btn-primary">Cek</button></a>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
  $("#link_order").click(function(){
    $("#link_order").attr("href", "<?=site_url()?>transaksi/info/"+$("#input_order").val());
  });
</script>
