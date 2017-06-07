<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'message-form',
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
					<?php echo $form->labelEx($model,'user_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'user_id'); ?>
					<?php 
					echo $form->dropDownList($model, "user_id",
						CHtml::listData(Users::model()->findall(array('condition'=>'id_user!='.YII::app()->user->id.'')),
							'id_user', 'username'
							),
						array("empty"=>"-- Send to --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'message'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'message'); ?>
					<?php echo $form->textArea($model,'message',array('class'=>'form-control','placeHolder'=>'Message')); ?>
				</div>

			</div>  

			<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

</div></div><!-- form -->