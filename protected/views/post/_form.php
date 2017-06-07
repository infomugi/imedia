<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<ul class="nav nav-tabs tabs">
			<li class="active tab"><a href="#post" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
				<span class="hidden-xs">Post</span></a></li>

				<li class="tab"><a href="#settings" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
					<span class="hidden-xs">Settings</span></a></li>

					<div class="indicator">
					</div>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="tab-content profile-tab-content">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'post-form',
						'enableAjaxValidation'=>false,
						'enableClientValidation' => true,
						'clientOptions' => array(
							'validateOnSubmit' => true,
							),
						'errorMessageCssClass' => 'label label-danger',
						'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
						)); ?>

						<!-- END: TAB 1 -->
						<div class="tab-pane active" id="post">
							<div class="row">
								<div class="col-md-12">
									<!-- Stats : Todak -->

									<div class="form-normal form-horizontal clearfix">
										<div class="col-lg-12 col-md-12"> 


											<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

											<div class="form-group">
												<div class="col-sm-12">
													<?php echo $form->error($model,'title'); ?>
													<?php echo $form->textField($model,'title',array('class'=>'form-control input-lg','placeHolder'=>'Title')); ?>
												</div>
											</div>  


											<div class="form-group">
												<div class="col-sm-12">
													<?php echo $form->error($model,'description'); ?>
													<?php echo $form->textArea($model,'description',array('class'=>'summernote','placeHolder'=>'Description')); ?>
												</div>
											</div>  


											<div class="form-group">
												<div class="col-sm-6">
													<?php echo $form->error($model,'image'); ?>
													<?php echo $form->fileField($model,'image',array('class'=>'btn btn-default waves-effect m-b-5')); ?>
												</div>
												<div class="col-sm-6">
													<?php echo $form->error($model,'id_category'); ?>
													<?php 
													echo $form->dropDownList($model, "id_category",
														CHtml::listData(Category::model()->findAll(array('condition'=>'status=1')),
															'id_category', 'name'
															),
														array("empty"=>"-- Category --", 'class'=>'select2 form-control')
														); 
														?> 
													</div>
												</div>  


												<div class="form-group">
													<div class="col-md-12">  
														<?php echo CHtml::submitButton($model->isNewRecord ? 'Publish' : 'Update', array('class' => 'btn btn-info pull-right waves-light')); ?>
													</div>
												</div>

											</div></div><!-- form -->

										</div>
									</div>
								</div>
								<!-- END: TAB 1 -->

								<!-- END: TAB 2 -->
								<div class="tab-pane active" id="settings">
									<div class="row">
										<div class="col-md-12">
											<!-- Stats : Week -->

											<div class="form-normal form-horizontal clearfix">
												<div class="col-lg-12 col-md-12"> 

													<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

													<div class="form-group">
														<div class="col-sm-6">
															<?php echo $form->error($model,'tags'); ?>
															<?php echo $form->textField($model,'tags',array('id'=>'tags')); ?>
														</div>

														<div class="col-sm-6">
															<?php echo $form->error($model,'keyword'); ?>
															<?php echo $form->textArea($model,'keyword',array('class'=>'form-control','placeHolder'=>'Short Description')); ?>
														</div>
													</div>  	

													<div class="form-group">
														<div class="col-sm-12">
															<?php echo $form->error($model,'url'); ?>
															<?php echo $form->textField($model,'url',array('class'=>'form-control','placeHolder'=>'Custom URL')); ?>
														</div>
													</div>  																	

													<div class="form-group">
														<div class="col-md-12">  
															<?php echo CHtml::submitButton($model->isNewRecord ? 'Publish' : 'Update', array('class' => 'btn btn-info pull-right waves-light')); ?>
														</div>
													</div>

													<?php $this->endWidget(); ?>

												</div></div><!-- form -->

											</div>
										</div>
									</div>
									<!-- END: TAB 2 -->

								</div>
							</div>
						</div>
						


