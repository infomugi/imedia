<?php
/* @var $this FilesController */
/* @var $model Files */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Upload',
	);

	$this->pageTitle='Upload File';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>