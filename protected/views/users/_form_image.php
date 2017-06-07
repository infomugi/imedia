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
			'clientOptions'=>array('validateOnSubmit'=>false),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>
			<?php if(!$model->image==""): ?>
				<div class="form-group">
					<div class="col-sm-4 control-label">
					</div>   
					<div class="col-sm-4">
						<center>
							<div class="item">
								<div class="gal-detail thumb">
									<a href='<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo $model->image; ?>' class="image-popup" title="<?php echo $model->username; ?>">
										<img src='<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo $model->image; ?>' class="thumb-img" alt="<?php echo $model->username; ?>" alt="Avatar <?php echo $model->username; ?>">
									</a>
								</div>
							</div>
						</center>
					</div>
				<div class="col-sm-4 control-label">
					</div>   					
				</div>  
			<?php endif; ?>			

			<div class="form-group">
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'image'); ?>
				</div>   
				<div class="col-sm-8">
					<?php echo $form->error($model,'image'); ?>
					<?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50, 'id'=>'fileupload','class'=>'btn btn-info')); ?>
				</div>
			</div>  

		</div>

	</div><!-- form -->

	<div class="panel-footer text-right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
		<BR><BR>
		</div>

		<?php $this->endWidget(); ?>

