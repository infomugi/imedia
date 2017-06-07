<?php
/* @var $this ExperienceController */
/* @var $model Experience */

$this->breadcrumbs=array(
	Division::model()->type($type)=>array('profile/'.YII::app()->user->name),
	'Add',
	);

	$this->pageTitle='Add '.Division::model()->type($type);
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>