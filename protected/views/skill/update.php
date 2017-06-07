<?php
/* @var $this SkillController */
/* @var $model Skill */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->id_skill=>array('view','id'=>$model->id_skill),
	'Edit',
	);

	$this->pageTitle='Edit Skill';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>