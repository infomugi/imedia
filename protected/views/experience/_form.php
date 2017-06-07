<?php
/* @var $this ExperienceController */
/* @var $model Experience */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'experience-form',
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
					<?php echo $form->labelEx($model,'type'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'type'); ?>
					<input type="text" class="form-control" value="<?php echo Division::model()->type($type); ?>" disabled="true">
					<?php //echo $form->textField($model,'type',array('class'=>'form-control','readonly'=>true,'value'=>Division::model()->type($type))); ?>
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
						CHtml::listData(Division::model()->findall(array('condition'=>'status=1 AND type='.$type.'')),
							'id_division', 'name'
							),
						array("empty"=>"-- ".Division::model()->type($type)." Category --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'name'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'name'); ?>
						<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Name')); ?>
						<?php 
						// echo $form->dropDownList($model, "name",
						// 	CHtml::listData(Experience::model()->findall(array('condition'=>'status=1 AND type='.$type.'')),
						// 		'name', 'name'
						// 		),
						// 	array("empty"=>"-- ".Division::model()->type($type)." Name --", 'class'=>'select2 form-control')
						// 	); 
							?> 
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'description'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'description'); ?>
							<?php echo $form->textArea($model,'description',array('class'=>'form-control','placeholder'=>'Address')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'date'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'date'); ?>
							<?php echo $form->textField($model,'date',array('class'=>'form-control','placeholder'=>'Month, Year','data-mask'=>"99-9999")); ?>
						</div>

					</div>  

				</div>
			</div><!-- form -->

			<div class="panel-footer text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				<BR><BR>
				</div>

				<?php $this->endWidget(); ?>