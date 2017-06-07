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
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/material/favicon.ico">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/waves.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/main.min.css">

	<body id="app" class="app off-canvas body-full">

		<!-- main-container -->
		<div class="main-container clearfix">

			<!-- content-here -->
			<div class="content-container" id="content">
				<div class="page page-auth">
					<div class="auth-container">

						<?php echo $content; ?>

					</div>
				</div>
			</div>

		</div>

	
	</body>
	</html>


