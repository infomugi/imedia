<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'post-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>
			<?php if(!$model->image==""): ?>
			<div class="form-group">
				<div class="col-sm-4 control-label">
				</div>   
				<div class="col-sm-8">
					<center>
						<div class="item">
							<a href='<?php echo Yii::app()->baseUrl; ?>/image/posting/big/<?php echo $model->image; ?>'><img src='<?php echo Yii::app()->baseUrl; ?>/image/posting/small/<?php echo $model->image; ?>' alt="Post Image"></a>
						</div>
					</center>
				</div>
			</div>
			<?php endif; ?>  			

			<div class="form-group">
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'image'); ?>
				</div>   
				<div class="col-sm-8">
					<?php echo $form->error($model,'image'); ?>
					<?php echo $form->fileField($model,'image',array('id'=>'fileupload','class'=>'btn btn-info')); ?>
				</div>
			</div>  

		</div>

	</div><!-- form -->

	<div class="panel-footer text-right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
		<BR><BR>
		</div>

		<?php $this->endWidget(); ?>

