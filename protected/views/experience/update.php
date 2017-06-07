<?php
/* @var $this ExperienceController */
/* @var $model Experience */

$this->breadcrumbs=array(
	'Experiences'=>array('index'),
	$model->name=>array('view','id'=>$model->id_experience),
	'Edit',
	);

	$this->pageTitle='Edit Experience';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>