<?php
/* @var $this SkillController */
/* @var $model Skill */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'skill-form',
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
					<?php echo $form->labelEx($model,'skill'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'skill'); ?>
					<?php echo $form->textField($model,'skill',array('class'=>'form-control','placeholder'=>'Yours Skill')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'percentage'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'percentage'); ?>
					<?php echo $form->textField($model,'percentage',array('class'=>'form-control','placeholder'=>'Percentage')); ?>
				</div>
				
			</div>  

			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'color'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'color'); ?>
					<?php echo $form->dropdownlist($model,'color',array('1'=>'Blue Navy','2'=>'Blue Sky','3'=>'Red','4'=>'Orange','5'=>'Green','6'=>'Black'),array('class'=>'form-control')); ?>
				</div>
				
			</div>  			
			
		</div>
	</div><!-- form -->

	<div class="panel-footer text-right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
		<BR><BR>
		</div>

		<?php $this->endWidget(); ?>
