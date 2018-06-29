<section>
  <div class="homepage">
    <div id="homeslide" class="owl-carousel">
      <img class="img-responsive" src="<?=site_url('dist/img/assets/slide.jpg')?>" alt="">
    </div>
    <div class="container">
      <div class="row info-slide">
        <div class="col-md-4">
          <img class="fleft max-width" src="<?=site_url('dist/img/assets/kalku.jpg')?>" alt="">
          <div class="fleft text">
            <p class="f-philo">KALKULATOR WALLPAPER</p>
            <p>Hitung kebutuhan wallpaper mu</p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="fleft max-width" src="<?=site_url('dist/img/assets/howto.jpg')?>" alt="">
          <div class="fleft text">
            <p class="f-philo">CARA PEMBELIAN</p>
            <p>Pelajari cara pembelian sebelum membeli</p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="fleft max-width" src="<?=site_url('dist/img/assets/promo.jpg')?>" alt="">
          <div class="fleft text">
            <p class="f-philo">PROMO LEBARAN</p>
            <p>Cek promo lebaran yang kami punya</p>
          </div>
        </div>
        <div class="clear"></div>
      </div>

      <div class="row text-welcome text-center">
        <div class="col-md-12">
          <p class="f-philo">
            Ruangan <span class="text-biru">Indah & Nyaman</span> Mampu <br>
            <span class="text-biru">Menyejukan Hati & Pikiran</span> Anda
          </p>
          <p class="text-babu">SELAMAT DATANG DI WALLPAPER INDONESIA</p>
        </div>
      </div>

      <div class="row wall-promo">
        <p class="text-center text-biru">PRODUK KAMI</p>
        <p class="text-center f-times">Wallpaper Promo</p>

        <?php for($a=1;$a<3;$a++): for($i=1;$i<5;$i++): ?>
        <div class="col-md-3 box-prod">
          <div class="img-hover relative">
            <img class="max-width" src="<?=site_url('dist/img/assets/wall'.$i.'.jpg')?>" alt="">
            <div class="hover-detail">
              <a href="#"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="info relative no-margin-p">
            <p class="f-mont">WALLPAPER 50.000/ROLL</p>
            <p class="f-mont"><span class="strip">Rp 803.000</span> Rp 90.000</p>
            <div class="disc text-center"><p><strong>DISC<br>20%</strong></p></div>
          </div>
        </div>
        <?php endfor; endfor; ?>
      </div>
    </div>

    <div class="container-fluid banner">
      <div class="row">
        <div class="col-md-6">
          <img class="img-responsive" src="<?=site_url('dist/img/assets/banner1.jpg')?>" alt="">
        </div>
        <div class="col-md-6">
          <img class="img-responsive" src="<?=site_url('dist/img/assets/banner2.jpg')?>" alt="">
        </div>
      </div>
    </div>

    <div class="container browse-prod">
      <div class="row">
        <p class="text-center text-biru">SEMUA PRODUK</p>
        <p class="text-center f-times">Browse Our Product</p>
        <ul class="pane-browse">
          <li>MERK</li>
          <li>WARNA</li>
          <li>MOTIF</li>
        </ul>
        <?php for($i=1;$i<5;$i++): ?>
        <div class="col-md-3 box-prod">          
          <div class="img-hover relative">
            <img class="max-width" src="<?=site_url('dist/img/assets/wall'.$i.'.jpg')?>" alt="">
            <div class="hover-detail">
              <a href="#"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="info relative no-margin-p">
            <p class="f-mont"><img src="<?=site_url('dist/img/assets/brand.png')?>" style="width:20px;vertical-align:text-bottom"> ARTNOUVEAU</p>
            <p class="f-mont"><span class="strip">Rp 803.000</span> Rp 90.000</p>
            <div class="disc text-center"><p><strong>DISC<br>20%</strong></p></div>
          </div>
        </div>
        <?php endfor; ?>
        <p class="all-product text-center"><a class="text-xbabu" href="#">LIHAT SEMUA PRODUK <i class="fa fa-long-arrow-right text-biru"></i></a></p>
      </div>
     </div>

     <div class="testimonial">
       <img class="middle block" src="<?=site_url('dist/img/assets/quote.png')?>" alt="">
       <p class="text-center f-mont">Hal terpenting dalam bisnis adalah memiliki <span class="text-biru">Pelanggan Yang Senang <br>
        Berbelanja Pada Kami.</span> Kami memberikan pelayanan terbaik.</p>
       <div id="testislide" class="owl-carousel middle">
         <div class="item text-center">
           <p class="f-times text-xbabu"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</em></p>
           <p class="member"><strong>MARRY WELL</strong> - <span class="text-babu">Designer</span></p>
         </div>
       </div>
     </div>
    </div>
</section>
