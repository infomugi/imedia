<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?> - <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=15 AND active=1" )->queryScalar();?></title>
	<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
	$cs = Yii::app()->getClientScript();
	Yii::app()->clientScript->registerCoreScript('jquery');
	?>  
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
	<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.ico">
	<meta name="description" content="<?php echo CHtml::encode($this->tags); ?>">
	<meta name="keyword" content="<?php echo CHtml::encode($this->tags); ?>">
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/head.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/screen.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/forms.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/frontend/styles/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
	<body>
		<div id="root" class="a">
			<?php require_once('frontend_header_portofolio.php');?>
			<article id="content">
					<?php echo $content; ?>
			</article>
		</div>
		<script type="text/javascript">
			head.load('<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/jquery.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/twitterFetcher.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/scripts.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/mobile.js', '<?php echo Yii::app()->theme->baseUrl; ?>/frontend/javascript/rewalk.js');
		</script>
</body>
</html>


