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
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/head.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/screen.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/forms.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
	<body>
		<?php require_once('frontend_header.php');?>
		<div id="root">
			<header id="top">
				<?php require_once('frontend_navigation.php');?>
			</header>  			
			<?php echo $content; ?>
			<?php require_once('frontend_footer.php');?>
		</div>
	
		<?php 
		//require_once('facebook_chat.php');
		//live_chat_facebook("https://www.facebook.com/mugirachmat/",Yii::app()->baseUrl);
		?>

		<script type="text/javascript">
			head.load('<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/jquery.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/twitterFetcher.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/scripts.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/mobile.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/rewalk.js');
		</script>
		
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
</body>
</html>

