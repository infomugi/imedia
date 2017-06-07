	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<title><?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=15 AND active=1" )->queryScalar();?></title>
	<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
	$cs = Yii::app()->getClientScript();
	Yii::app()->clientScript->registerCoreScript('jquery');
	?>  
	<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=11 AND active=1" )->queryScalar();?>

	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="image/favicon/favicon.ico">
	<link href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.ico" rel="icon" type="image/x-icon">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/assets/css/bootstrap.css" >

	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/lib/font-awesome-4.3.0/css/font-awesome.min.css" >

	<!-- OWL CSS -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/lib/owl.carousel/owl-carousel/owl.carousel.css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/lib/owl.carousel/owl-carousel/owl.theme.css"/>

	<!-- Custom styles for this template -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/css/font.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/css/style.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/css/color.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/promo/css/font-awesome.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/js/html5shiv.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/js/respond.min.js"></script>
	<![endif]-->

	<body>

	<?php echo $content; ?>

		<?php 
		//require_once('facebook_chat.php');
		//live_chat_facebook("https://www.facebook.com/mugirachmat/",Yii::app()->baseUrl);
		?>
		
		<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5823ef1f1e35c727dc2d4ccb/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->	

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/js/jquery.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/assets/js/bootstrap.min.js"></script>

	<!-- jQuery Parallax
	================================================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/lib/jquery-parallax/scripts/jquery.parallax-1.1.3.js"></script>

	<!-- jQuery OWL
	================================================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/lib/owl.carousel/owl-carousel/owl.carousel.min.js"></script>

	<!-- jQuery ajaxchimp
	================================================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/js/jquery.ajaxchimp.min.js"></script>	

	<!-- jQuery Custom
	================================================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/promo/js/custom.js" type="text/javascript"></script>

	<!-- Tweet Script
	================================================== -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

	</body>
	</html>


