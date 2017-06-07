<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'files-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'name'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'name'); ?>
					<?php echo $form->fileField($model,'name',array('class'=>'btn btn-default waves-effect m-b-5')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'category'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'category'); ?>
					<?php 
					echo $form->dropDownList($model, "category",
						CHtml::listData(Category::model()->findall(array('condition'=>'status=1')),
							'id_category', 'name'
							),
						array("empty"=>"-- Category --", 'class'=>'select2 form-control')
						); 
						?> 

					</div>

				</div>  

			</div>
		</div><!-- form -->

		<div class="panel-footer text-right">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			<BR><BR>
			</div>

			<?php $this->endWidget(); ?>
