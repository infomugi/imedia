<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id_category),
	'Edit',
	);

	$this->pageTitle='Edit Category';
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>