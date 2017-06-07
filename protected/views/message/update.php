<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->name=>array('view','id'=>$model->id_message),
	'Edit',
	);

	$this->pageTitle='Edit Message';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>