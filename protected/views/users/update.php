<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Edit',
	);

	$this->pageTitle='Edit Profile' . ' - ' . $model->first_name;
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>