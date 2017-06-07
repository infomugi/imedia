<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Update',
	);

	$this->pageTitle='Edit Post Image' . ' - ' . $model->title;
	?>

	<?php echo $this->renderPartial('_form_image', array('model'=>$model)); ?>