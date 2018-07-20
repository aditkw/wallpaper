<section>
  <div class="homepage">
    <div id="homeslide" class="owl-carousel">
      <?php foreach ($slide as $sld): ?>
        <img class="max-width middle w-auto" src="<?=site_url("uploads/img/slide/$sld->banner_image")?>" alt="">
      <?php endforeach; ?>
    </div>
    <div class="container">
      <div class="row info-slide">
        <div class="col-md-4">
          <a href="<?=site_url('kalkulator')?>">
            <img class="pull-left max-width" src="<?=site_url('dist/img/assets/kalku.jpg')?>" alt="">
          </a>
          <div class="pull-left text">
            <p class="f-philo">KALKULATOR WALLPAPER</p>
            <p>Hitung kebutuhan wallpaper mu</p>
          </div>
        </div>
        <div class="col-md-4">
          <a href="<?=site_url('cara-belanja')?>">
            <img class="pull-left max-width" src="<?=site_url('dist/img/assets/howto.jpg')?>" alt="">
          </a>
          <div class="pull-left text">
            <p class="f-philo">CARA PEMBELIAN</p>
            <p>Pelajari cara pembelian sebelum membeli</p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="pull-left max-width" src="<?=site_url('dist/img/assets/promo.jpg')?>" alt="">
          <div class="pull-left text">
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

        <?php foreach($promo_wp as $wp): ?>
        <?php if ($wp->product_discount): ?>
          <div class="col-md-3 box-prod">
            <div class="img-hover relative">
              <img class="max-width" src="<?=site_url("uploads/img/product/$wp->image_name")?>" alt="">
              <div class="hover-detail">
                <a href="<?=site_url('produk/detail/'.$wp->product_code.'/'.$wp->product_link)?>"><i class="fa fa-search"></i></a>
              </div>
            </div>
            <div class="info relative no-margin-p">
              <p class="f-mont"><?=$wp->product_name?></p>
              <p class="f-mont"><span class="strip"><?=rupiah($wp->product_price_strip)?></span> <?=rupiah($wp->product_price)?></p>
              <?php if ($wp->product_discount): ?>
                <div class="disc text-center"><p><strong>DISC<br><?=$wp->product_discount?>%</strong></p></div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="container banner">
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
          <li>
            MERK
            <ul class="active">
              <?php foreach ($merk as $merk): ?>
                <li><a href="<?=site_url("produk/$wallpaper->category_link/$merk->brand_link")?>"><?=$merk->brand_name?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="garis">
            WARNA
            <ul>
              <?php foreach ($color as $color): ?>
                <li><?=$color->color_name?></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li>
            MOTIF
            <ul>
              <?php foreach ($motif as $motif): ?>
                <li><a href="<?=site_url("produk/$wallpaper->category_link?motif=$motif->motif_link")?>"><?=$motif->motif_name?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
        <?php foreach($brand_wp as $brand): ?>
          <div class="col-md-3 box-prod">
            <div class="img-hover relative">
              <img class="max-width" src="<?=site_url("uploads/img/brand/$brand->brand_image")?>" alt="">
              <div class="hover-detail">
                <a href="<?=site_url('produk/'.$wallpaper->category_link.'/'.$brand->brand_link)?>"><i class="fa fa-search"></i></a>
              </div>
            </div>
            <div class="info relative no-margin-p">
              <p class="f-mont"><img src="<?=site_url('dist/img/assets/brand.png')?>" style="width:20px;vertical-align:text-bottom"> <?=$brand->brand_name?></p>
              <p class="f-mont"><span class="strip"><?=rupiah($brand->brand_price_strip)?></span> <?=rupiah($brand->brand_price)?></p>
              <?php if ($brand->brand_discount): ?>
                <div class="disc text-center"><p><strong>DISC<br><?=$brand->brand_discount?>%</strong></p></div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="all-product text-center"><a class="text-xbabu" href="<?=site_url('produk/'.$wallpaper->category_link)?>">LIHAT SEMUA PRODUK <i class="fa fa-long-arrow-right text-biru"></i></a></p>
     </div>

     <div class="testimonial relative">
       <img class="middle block" src="<?=site_url('dist/img/assets/quote.png')?>" alt="">
       <p class="text-center f-mont">Hal terpenting dalam bisnis adalah memiliki <span class="text-biru">Pelanggan Yang Senang <br>
        Berbelanja Pada Kami.</span> Kami memberikan pelayanan terbaik.</p>
       <div id="testislide" class="owl-carousel middle">
        <?php foreach ($testimonial as $testi):?>
         <div class="item text-center">
           <p class="f-times text-xbabu"><em><?=$testi->testi_desc?></em></p>
           <p class="member"><strong><?=$testi->testi_name?></strong> - <span class="text-babu"><?=$testi->testi_job?></span></p>
         </div>
       <?php endforeach; ?>
       </div>
       <div class="am-prev">
         <i class="fa fa-angle-left"></i>
       </div>
       <div class="am-next">
         <i class="fa fa-angle-right"></i>
       </div>
     </div>
    </div>
</section>
