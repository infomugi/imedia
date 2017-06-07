<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
	$cs = Yii::app()->getClientScript();
	Yii::app()->clientScript->registerCoreScript('jquery');
	?>  
	<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=11 AND active=1" )->queryScalar();?>
<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.ico">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/slideshow.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/font-awesome.css">
	<noscript><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/fallback.css" /></noscript>
	<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/fallback.css" />
	<![endif]-->	

	<body>

		<?php echo $content; ?>

		<!--modernizr js-->
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/modernizr.custom.26633.js"></script>
		<!--jquary min js-->
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.gridrotator.js"></script>
		<!--for custom jquary-->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/custom.js"></script>
		<!--for placeholder jquary-->
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.placeholder.js"></script>
		<!--for menu jquary-->
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/stickUp.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$(document).ready( function() {
				  //enabling stickUp on the '.navbar-wrapper' class
				  $('.navbar-wrapper').stickUp({
				  	parts: {
				  		0: 'banner',
				  		1: 'aboutme',
				  		2: 'technical',
				  		3: 'exprience',
				  		4: 'education',
				  		5: 'protfolio',
				  		6: 'contact'
				  	},
				  	itemClass: 'menuItem',
				  	itemHover: 'active',
				  	topMargin: 'auto'
				  });
				});

				$( ".navbar.navbar-inverse.navbar-static-top a" ).click(function() {
					$( ".navbar-collapse" ).addClass( "hideClass" );
				});


				$( ".navbar.navbar-inverse.navbar-static-top a" ).click(function() {
					$( ".navbar-collapse" ).addClass( "collapse" );
				});


				$( ".navbar.navbar-inverse.navbar-static-top a" ).click(function() {
					$( ".navbar-collapse" ).removeClass( "in" );
				});

				$( ".navbar-toggle" ).click(function() {
					$( ".navbar-collapse" ).removeClass( "hideClass" );
				});


			});
		</script>
		<!--for portfoli filter jquary-->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.isotope.js" type="text/javascript"></script>
		<!--for portfoli lightbox -->
		<link type="text/css" rel="stylesheet" id="theme" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/jquery-ui-1.8.16.custom.css">
		<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/profile/css/lightbox.min.css">
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.ui.rlightbox.js"></script>
		<!--for skill chat jquary-->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.easing.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.easypiechart.js"></script>
		<!--contact form js-->
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/profile/js/jquery.contact.js"></script>

	</body>
	</html>

