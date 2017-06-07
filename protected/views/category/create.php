<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Category';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>