<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->Category->name=>array('category/view','id'=>$model->id_category),
	'Update',
	);

	$this->pageTitle='Edit - '.$model->title;
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>