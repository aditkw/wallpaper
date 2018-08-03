$(function){
  let abs = "http://localhost/wallpaper/"
  let imgAwal = $("#atas-brand").attr('img-awal')
  let choose;
  switch (imgAwal) {
    case "ada":
      choose = abs+"uploads/img/product/<?php echo $this->bener ?>"
      break;
    case "all":
      choose = abs+"dist/img/assets/product-detail-brand-header.png"
      break;
    case "default":
      choose = abs+"dist/img/assets/no-prod.png"
      break;
  }

  $('#atas-brand').css("background-image", "url("+choose+")");

  $('.imgKcl').on('click', function(){

    // alert('zzz')
    let attrKcl= $(this).attr('data-img')
    $('#atas-brand').css("background-image", "url("+abs+"uploads/img/product/"+attrKcl+")");
  });

  $("#prodBrand").owlCarousel({
    loop:false,
    autoplay: true,
    smartSpeed: 1000,
    responsiveClass:true,
    autoplayHoverPause: false,
    responsive:{
      320:{
        items:1
      },
      480:{
        items:2
      },
      600:{
        items:3
      },
      768:{
        items:4
      },
      1000:{
        items:5
      }
    }
  });

  var currentLocation = window.location.href
  $(".colorcheck").change(function() {
      var ini = $(this);
      var simpen = [];
      <?php if(!empty($_GET['color'])): ?>
        masukin = "<?=$_GET['color']?>";
        simpen.push(masukin);
      <?php endif; ?>
      if (this.checked) {
        simpen.push(ini.val());
      }
      else {
        simpen = simpen.join();
        simpen = simpen.split(',');
        var index = simpen.indexOf(ini.val());
        if (index !== -1) simpen.splice(index, 1);
      }

      var cari = currentLocation.search('color=');
      var carilagi = currentLocation.search('&');
      if (cari > 0 && carilagi < 0) {
        var current = currentLocation.split("=");
        current.pop();
        currentLocation = current+"="+simpen.join();
        window.location.href = currentLocation;
      }else {
        if (carilagi > 0 && cari < 0) {
          window.location.href = currentLocation+"color="+simpen.join();
        }
        else if (cari > 0) {
          var current = currentLocation.split("color=");
          current.pop();
          window.location.href = current+"color="+simpen.join();
        }
        else {
          window.location.href = currentLocation+"?color="+simpen.join();
        }
      }
    });

    $(".motifcheck").change(function() {
      var ini = $(this);
      var kateg = currentLocation.split("/");
      console.log(ini.val());
      kateg = kateg[kateg.length - 2];
      window.location.href = "<?=site_url('produk')?>/"+kateg+"?motif="+ini.val();
    });
}
