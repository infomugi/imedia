<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'New',
	);

	$this->pageTitle='New Post';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>