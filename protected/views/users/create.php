<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Users';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>