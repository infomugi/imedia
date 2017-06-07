<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Send',
	);

	$this->pageTitle='Send Message';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>