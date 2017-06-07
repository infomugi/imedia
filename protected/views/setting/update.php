<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id_setting),
	'Edit',
	);

	$this->pageTitle='Edit Setting';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>