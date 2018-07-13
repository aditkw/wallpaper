<?php
if (empty($metadata_seo->seo_title)) {
	$title = $metadata_site->site_title;
	$description = $metadata_site->site_desc;
	$keywords = $metadata_site->site_keyword;
}

else {
	$title = $metadata_seo->seo_title;
	$description = $metadata_seo->seo_desc;
	$keywords = $metadata_seo->seo_keyword;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#2890d5">
		<meta name="description" content="<?php echo $description ?>">
		<meta name="keywords" content="<?php echo $keywords ?>">

		<title><?php echo $title ?></title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Fonts Awesome -->
		<link href="<?php echo base_url();?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- bxSlider Javascript file -->
		<link href="<?php echo base_url();?>plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />
		<!-- Owl Carousel Javascript file -->
		<link href="<?php echo base_url();?>plugins/owl-carousel/dist/assets/owl.carousel.css" rel="stylesheet" />
		<!-- Fancybox file -->
		<link href="<?php echo base_url();?>plugins/fancyapp/source/jquery.fancybox.css?v=2.1.5" media="screen" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url();?>plugins/fancyapp/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" rel="stylesheet" />
		<!--javascript zebra-datepicker -->
		<link href="<?php echo base_url();?>plugins/zebra-datepicker/public/css/default.css" type="text/css" rel="stylesheet">
		<!-- LWD Style -->
		<link href="<?php echo base_url();?>dist/css/lwd.style.css" rel="stylesheet">
		<!-- <link href="<?php echo base_url();?>dist/img/assets/fav.png?" rel="shortcut icon" type="image/ico"> -->
	</head>
<body>
