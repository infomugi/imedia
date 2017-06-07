<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username=>array('view','id'=>$model->id_user),
	'Update',
	);

	$this->pageTitle='Edit Cover' . ' - ' . $model->first_name;
	?>

	<?php echo $this->renderPartial('_form_image_cover', array('model'=>$model)); ?>