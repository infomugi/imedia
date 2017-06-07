<?php
/* @var $this SkillController */
/* @var $model Skill */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Skill';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>