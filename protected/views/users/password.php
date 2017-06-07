<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Update',
	);

	$this->pageTitle='Edit Password';
	?>

	<?php echo $this->renderPartial('_form_password', array('model'=>$model)); ?>