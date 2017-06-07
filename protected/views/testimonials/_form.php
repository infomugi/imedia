<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'testimonials-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'customer_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'customer_id'); ?>
					<?php 
					echo $form->dropDownList($model, "customer_id",
						CHtml::listData(Users::model()->findall(array('condition'=>'level=3')),
							'id_user', 'username'
							),
						array("empty"=>"-- Customer --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'description'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'description'); ?>
						<?php echo $form->textArea($model,'description',array('placeHolder'=>'Description','class'=>'form-control')); ?>
					</div>

				</div>  


			</div>
			</div><!-- form -->

			<div class="panel-footer text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				<BR><BR>
				</div>

				<?php $this->endWidget(); ?>
