<?php
/* @var $this FilesController */
/* @var $model Files */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->name=>array('view','id'=>$model->id_file),
	'Edit',
	);

	$this->pageTitle='Edit Files';
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>