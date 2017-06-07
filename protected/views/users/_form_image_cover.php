<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			<div class="form-group">
				<div class="col-sm-4 control-label">
				</div>   
				<div class="col-sm-8">
					<center>
						<div class="item">
							<a href='<?php echo Yii::app()->baseUrl; ?>/image/cover/<?php echo $model->cover; ?>'><img src='<?php echo Yii::app()->baseUrl; ?>/image/cover/<?php echo $model->cover; ?>' width="100%" alt="Profile Cover"></a>
						</div>
					</center>
				</div>
			</div>  			

			<div class="form-group">
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'cover'); ?>
				</div>   
				<div class="col-sm-8">
					<?php echo $form->error($model,'cover'); ?>
					<?php echo $form->fileField($model,'cover',array('size'=>50,'maxlength'=>50, 'id'=>'fileupload','class'=>'btn btn-info')); ?>
				</div>
			</div>  

		</div>

	</div><!-- form -->

	<div class="panel-footer text-right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
		<BR><BR>
		</div>
		
		<?php $this->endWidget(); ?>
