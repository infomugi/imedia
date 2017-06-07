<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Testimonials';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>