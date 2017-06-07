<?php
/* @var $this DivisionController */
/* @var $model Division */

$this->breadcrumbs=array(
	'Divisions'=>array('index'),
	$model->name=>array('view','id'=>$model->id_division),
	'Edit',
	);

	$this->pageTitle='Edit Division';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>