<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->widget('ext.yii-toastr.MugiToastr', array(
	'flashMessagesOnly' => true, 
	'options' => array(
		"closeButton" => true,
		"debug" => true,
		"progressBar"=> true,
		"positionClass" => "toast-bottom-left",
		"showDuration" => "600",
		"hideDuration" => "1000",
		"timeOut" => "15000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
		)
	));

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Setting - '.$model->name;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Setting'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Setting'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Setting'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_setting,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Setting'));
						?>
						<?php echo CHtml::link('<i class="fa fa-check"></i>', 
							array('active', 'id'=>$model->id_setting,
								), array('class' => 'btn btn-success btn-flat', 'title'=>'Set Active'));
								?>
								<?php echo CHtml::link('<i class="fa fa-close"></i>', 
									array('nonactive', 'id'=>$model->id_setting,
										), array('class' => 'btn btn-warning btn-flat', 'title'=>'Set Non Active'));
										?>												

									</span> 

									<span class="hidden-xs">

										<?php echo CHtml::link('Add',
											array('create'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Add Setting'));
											?>
											<?php echo CHtml::link('List',
												array('index'),
												array('class' => 'btn btn-primary btn-flat', 'title'=>'List Setting'));
												?>
												<?php echo CHtml::link('Manage',
													array('admin'),
													array('class' => 'btn btn-primary btn-flat','title'=>'Manage Setting'));
													?>
													<?php echo CHtml::link('Edit', 
														array('update', 'id'=>$model->id_setting,
															), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Setting'));
															?>
															<?php if($model->active==0){ ?>
															<?php echo CHtml::link('<i class="fa fa-check"></i>', 
																array('publish', 'id'=>$model->id_setting), 
																array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
																);
																?>	
																<?php }else{ ?>
																<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
																	array('default', 'id'=>$model->id_setting), 
																	array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Set Default')
																	);
																	?>		
																	<?php } ?>																	

																</span>

																<HR>

																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			'name',
																			'description',
																			),
																			)); ?>


																	<?php $form=$this->beginWidget('CActiveForm', array(
																		'id'=>'setting-form',
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
																			<div class="col-sm-12">
																				<?php echo $form->error($model,'content'); ?>
																				<?php echo $form->textArea($model,'content',array('class'=>'form-control','id'=>'code')); ?>
																			</div>
																		</div>  

																		<div class="panel-footer text-right">
																			<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
																			<BR><BR>
																			</div>

																			<?php $this->endWidget(); ?>


																			<STYLE>
																				th{width:150px;}
																			</STYLE>

																			<link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/codemirror/codemirror.css" rel="stylesheet">

																			<!-- CodeMirror -->
																			<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/codemirror/codemirror.js"></script>
																			<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/codemirror/xml.js"></script>
																			<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/plugins/codemirror/custom.codemirror.js"></script>

