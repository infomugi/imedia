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
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
	<meta name="description" content="<?php echo CHtml::encode($this->keyword); ?> - <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=15 AND active=1" )->queryScalar();?>">
	<meta name="keyword" content="<?php echo CHtml::encode($this->tags); ?>">
	<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.ico">

	<meta property='fb:app_id' content='595098423952759'/>
	<meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo CHtml::encode($this->url); ?>"/>
	<meta property="og:image" content="<?php echo Yii::app()->baseUrl; ?>/image/posting/<?php echo CHtml::encode($this->image); ?>"/>
	<meta property="og:description" content="<?php echo CHtml::encode($this->keyword); ?>"/>
	<meta property="og:site_name" content="Infomugi Media"/>
	<meta property="og:image:width" content="600"/>
	<meta property="og:image:height" content="300"/>
	<link rel="image_src" href="<?php echo Yii::app()->baseUrl; ?>/image/posting/middle/<?php echo CHtml::encode($this->image); ?>"/>
	<meta itemprop="name" content="<?php echo CHtml::encode($this->pageTitle); ?>">
	<meta itemprop="description" content="<?php echo CHtml::encode($this->keyword); ?>">
	<meta itemprop="image" content="<?php echo Yii::app()->baseUrl; ?>/image/posting/<?php echo CHtml::encode($this->image); ?>">

	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/head.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/screen.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/forms.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
	<body>
		<div id="root">
			<?php require_once('frontend_header_post.php');?>
			<section id="content" class="cols-a">
				<div class="news-a">
					<?php echo $content; ?>
				</div>
				<?php require_once('frontend_post_sidebar.php');?>
			</section>
			<?php require_once('frontend_footer.php');?>
		</div>

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
				
		<script type="text/javascript">
			head.load('<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/jquery.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/twitterFetcher.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/scripts.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/mobile.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/rewalk.js');
		</script>
	</body>
	</html>