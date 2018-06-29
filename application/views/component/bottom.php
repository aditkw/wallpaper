<?php // $cekslider = mysql_query("SELECT id_slider FROM slider WHERE status='1'"); $csld = mysql_num_rows($cekslider); ?>
<script src="<?php echo base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>plugins/bxslider/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url();?>plugins/owl-carousel/dist/owl.carousel.js"></script>
<script src="<?php echo base_url();?>plugins/fancyapp/source/jquery.fancybox.js?v=2.1.5"></script>
<script src="<?php echo base_url();?>plugins/fancyapp/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/zebra-datepicker/public/javascript/zebra_datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>dist/js/smoothscroll.min.js"></script>
<script src="<?php echo base_url();?>dist/js/ajax.js"></script>
<script src="<?php echo base_url();?>dist/js/lwd.js"></script>

<script type="text/javascript">

$(document).ready(function(){

		$('#shipment').change(function () {
			var ship = $(this).val();
			var ar_ship = ship.split(':');
			var subTotal = document.getElementById("subTotal").value;
			var total = subTotal + ar_ship;
			document.getElementById("shipCost").innerHTML = ar_ship[2];
			document.getElementById("total").innerHTML = total;
		})
		/* Select City */
		$('#province').change(function() {
			var id = $(this).val();
			// alert(id_category);
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('member/ajax_city')?>',
				data: { dataID: id},
				success: function(response) {
					$('#city').html(response);
				}
			});
		});
		/* Select District */
		$('#city').change(function() {
			var id = $(this).val();
			// alert(id_category);
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('member/ajax_district')?>',
				data: { dataID: id},
				success: function(response) {
					$('#district').html(response);
				}
			});
		});
		/* Select Cost */
		/*$('#district').change(function() {
			var id = $(this).val();
			// alert(id_category);
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('keranjang/ajax_shipment')?>',
				data: { dataID: id},
				error: function () {
					alert('error');
				},
				success: function(response) {
					$('#shipment').html(response);
				}
			});
		});*/

	/* Peta */
	$('.peta').click(function () {
		$('.peta iframe').css("pointer-events", "auto");
	});
	/* End Peta */

	/* Jquery Bxslider */
	$('.bxslider').bxSlider({
		auto: true,
		speed: 500,
		autoControls: false,
		adaptiveHeight: true,
		pager : false,
		controls : true
	});
	/* End Jquery Bxslider */

	/* Jquery Owl-Carousel */
	$("#homeslide").owlCarousel({
		loop:true,
		autoplay: true,
		smartSpeed: 2000,
		responsiveClass:true,
		autoplayHoverPause: true,
		responsive:{
			320:{
				items:1
			},
			480:{
				items:1
			},
			600:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	$("#testislide").owlCarousel({
		loop:true,
		autoplay: true,
		smartSpeed: 2000,
		responsiveClass:true,
		autoplayHoverPause: true,
		responsive:{
			320:{
				items:1
			},
			480:{
				items:1
			},
			600:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});


	$(".bestpro-prev").click(function(){
		owlBestpro.trigger('prev.owl.carousel');
	});
	$(".bestpro-next").click(function(){
		owlBestpro.trigger('next.owl.carousel');
	});
	$(".testi-prev").click(function(){
		owlTesti.trigger('prev.owl.carousel');
	});
	$(".testi-next").click(function(){
		owlTesti.trigger('next.owl.carousel');
	});
	/* End jquery Owl-Carousel */

	/* Sldie Menu */
	$('#barkat').click(function(){
		$('.menu-topbar').slideToggle();
	});
	$('.ikon-bar').click(function(){
		$('#side-menu').css({"left":"0", "visibility":"visible"});
	});
	$('#side-menu-close').click(function(){
		$('#side-menu').css({"left":"-100%", "visibility":"hidden"});
	});
	$('.target-menu-merk').click(function(){
		$('.menu-merk').slideToggle();
	});
	/* End menu category */

	/* fancybox */
	$('.fancybox').fancybox();

	$('.fancyvid').click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
				 'wmode'		: 'transparent',
				'allowfullscreen'	: 'true'
			}
		});
		return false;
	});
	/* end fancybox */

	/* Zebra datepicker */
	$('.tgl-picker').Zebra_DatePicker({
		format: 'Y-m-d'
	});
	/* End zebra datepicker */

	/* Toggle Menu -*/
	$('.cssmenu > ul > li > a').click(function()
	{
		var checkElement = $(this).next();

		if((checkElement.is('ul')) && (checkElement.is(':visible')))
		{
			checkElement.slideUp('slow');
		}

		if((checkElement.is('ul')) && (!checkElement.is(':visible')))
		{
			$('.cssmenu ul ul:visible').slideUp('slow');
			checkElement.slideDown('slow');
		}

		if($(this).closest('li').find('ul').children().length == 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	});
	/* End Toggle Menu */

	if('.fadeout-message'){
		setTimeout(function() {
			$('.fadeout-message').slideUp(400);
		}, 5000);
	}
});
</script>

<!-- /*captcha*/ -->
<script type="text/javascript">
	var strLoading = '<div style="padding:2px;color:#FF0000;"><img src="<?php echo base_url();?>dist/img/assets/ajax-loader.gif" /> Loading...</div>';
	/*
	* This is the function to create a new XML HTTP object GET Request
	* @author Raju Gautam
	* @version 0.1
	* @copyright Copyright (c) 2007, Raju Gautam
	* @date Dec 31, 2007
	**/
	function GetXmlHttpObject(){
		var xmlHttp;
		try{
			/* Firefox, Opera 8.0+, Safari */
			xmlHttp = new XMLHttpRequest();
		}
		catch (e){
			/* Internet Explorer */
			try{
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e){
				try{
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Your browser does not support AJAX!");
					return false;
				}
			}
		}
		return xmlHttp;
	}

	/* This is the function to used to show the response text from server
	* @author Raju Gautam
	* @version 0.1
	* @copyright Copyright (c) 2007, Raju Gautam
	* @date Dec 31, 2007
	**/
	function afterStateChange(xmlHttp, contentDiv, divLoading){
		if(xmlHttp.readyState < 4){
			showLoading('On', contentDiv, divLoading);
		}
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
			showLoading('Off', contentDiv, divLoading);
			document.getElementById(contentDiv).innerHTML 	= xmlHttp.responseText
		}
	}

	/* This is the function to show/hide the loading message
	* @author Raju Gautam
	* @version 0.1
	* @copyright Copyright (c) 2007, Raju Gautam
	* @date Dec 31, 2007
	**/
	function showLoading(flag, contentDiv, divLoading){
		if(divLoading != ''){
			var objLoading = document.getElementById(divLoading);
			if(!objLoading) var objLoading = document.getElementById(contentDiv);
			if(flag == 'On') objLoading.innerHTML = strLoading;
			else if(flag == 'Off') objLoading.innerHTML = '';
		}
	}
	/*
	* This is the function to send the request to the server
	* @author Raju Gautam
	* @version 0.1
	* @copyright Copyright (c) 2007, Raju Gautam
	* @date Dec 31, 2007
	**/
	function sendGetRequest(para_url, contentDiv, divLoading){
		var url = "";
		var xmlHttp = GetXmlHttpObject();
		if(para_url.indexOf('?') != 0 && para_url.indexOf('?') != -1) url = para_url + "&rand=" + Math.random();
		else url = para_url + "?rand=" + Math.random();

		xmlHttp.onreadystatechange = function(){
			afterStateChange(xmlHttp, contentDiv, divLoading);
		}
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	}
</script>
<!-- /* end captcha */ -->
</body>
</html>
