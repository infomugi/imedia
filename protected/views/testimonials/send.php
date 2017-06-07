<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	'Send',
	);

	$this->pageTitle='Send Testimonials';
	?>

	<?php echo $this->renderPartial('_form_send', array('model'=>$model)); ?>