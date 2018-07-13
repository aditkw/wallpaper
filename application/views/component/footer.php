<footer>
  <div class="subs-email relative">
    <div class="info">
      <p class="f-philo text-center text-putih">Sign Up For Newsletter</p>
      <p class="f-segoe text-center text-putih">Daftar & dapatkan update terbaru serta penawaran spesial.</p>
      <form class="form-subs">
        <input type="text" name="subs" placeholder="Alamat email anda"><button type="submit">Subscribe</button>
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
        <div class="col-md-7">
          <a class="text-putih" href="<?=site_url()?>">Beranda</a>
          <a class="text-putih" href="<?=site_url('tentang-kami')?>">Tentang Kami</a>
          <a class="text-putih" href="<?=site_url('#produk')?>">Produk</a>
          <a class="text-putih" href="<?=site_url('#testimonial')?>">Testimonial</a>
          <a class="text-putih" href="<?=site_url('news')?>">Berita/Event</a>
          <a class="text-putih" href="<?=site_url('hubungi-kami')?>">Hubungi Kami</a>
        </div>
        <div class="col-md-2">
          <div class="sosmed">
            <a href="#"><img src="<?=site_url('dist/img/assets/fb-ico.png')?>"></a>
            <a href="#"><img src="<?=site_url('dist/img/assets/tw-ico.png')?>"></a>
            <a href="#"><img src="<?=site_url('dist/img/assets/yt-ico.png')?>"></a>
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
              <p><a class="text-putih" href="<?=site_url('member-login')?>">Login</a></p>
              <p><a class="text-putih" href="<?=site_url('keranjang')?>">Keranjang Belanja</a></p>
              <p><a class="text-putih" href="<?=site_url('konfirmasi')?>">Konfirmasi Pembayaran</a></p>
              <p><a class="text-putih" style="cursor:pointer" id="search-btn">Cek Status Order</a></p>
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
