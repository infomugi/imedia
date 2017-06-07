<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'users-form',
			'enableAjaxValidation' => FALSE,
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
					<?php echo $form->labelEx($model,'username'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
				</div>

			</div>  
			

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'email'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email Address')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'first_name'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'first_name'); ?>
					<?php echo $form->textField($model,'first_name',array('class'=>'form-control','placeholder'=>'First Name')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'last_name'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'last_name'); ?>
					<?php echo $form->textField($model,'last_name',array('class'=>'form-control','placeholder'=>'Last Name')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'location'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'location'); ?>
					<?php echo $form->textField($model,'location',array('class'=>'form-control','placeholder'=>'Address')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'website'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'website'); ?>
					<?php echo $form->textField($model,'website',array('class'=>'form-control','placeholder'=>'Website')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'bio'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'bio'); ?>
					<?php echo $form->textArea($model,'bio',array('class'=>'form-control','placeholder'=>'Bio')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'job'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'job'); ?>
					<?php echo $form->textField($model,'job',array('class'=>'form-control','placeholder'=>'Job Title')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'phone'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'phone'); ?>
					<?php echo $form->textField($model,'phone',array('class'=>'form-control','placeholder'=>'Phone')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'pin'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'pin'); ?>
					<?php echo $form->textField($model,'pin',array('class'=>'form-control','placeholder'=>'Pin BB')); ?>
				</div>

			</div>  									


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'birth'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'birth'); ?>
					<?php echo $form->textField($model,'birth',array('class'=>'form-control','placeholder'=>'Birthday','data-mask'=>"99-99-9999")); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'gender'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'gender'); ?>
					<?php
					echo $form->radioButtonList($model,'gender',
						array('1'=>'Male','0'=>'Female'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'style'=>'padding-right:20px;margin-left:15px'),

							)                              
						);
						?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'facebook'); ?>
					</div>   

					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-facebook"></i></button>
							</span>
							<?php echo $form->error($model,'facebook'); ?>
							<?php echo $form->textField($model,'facebook',array('class'=>'form-control','placeholder'=>'Facebook Account')); ?>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'twitter'); ?>
					</div>   

					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-twitter"></i></button>
							</span>
							<?php echo $form->error($model,'twitter'); ?>
							<?php echo $form->textField($model,'twitter',array('class'=>'form-control','placeholder'=>'Twitter Account')); ?>
						</div>
					</div>					

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'gplus'); ?>
					</div>   

					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-google"></i></button>
							</span>
							<?php echo $form->error($model,'gplus'); ?>
							<?php echo $form->textField($model,'gplus',array('class'=>'form-control','placeholder'=>'Google+ Account')); ?>
						</div>
					</div>						

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'division'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'division'); ?>
						<?php 
						echo $form->dropDownList($model, "division",
							CHtml::listData(Division::model()->findall(array('condition'=>'status=1 AND type=1')),
								'id_division', 'name'
								),
							array("empty"=>"-- Division --", 'class'=>'select2 form-control')
							); 
							?> 

						</div>

					</div>  


				</div>
			</div><!-- form -->

			<div class="panel-footer text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				<BR><BR>
				</div>

				<?php $this->endWidget(); ?>
