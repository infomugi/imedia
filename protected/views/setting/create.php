<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Setting';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>