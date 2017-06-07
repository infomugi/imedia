<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->id_testimonial=>array('view','id'=>$model->id_testimonial),
	'Edit',
	);

	$this->pageTitle='Edit Testimonials';
	?>

	<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>