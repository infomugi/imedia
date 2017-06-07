<?php
/* @var $this FilesController */
/* @var $model Files */

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
	'Files'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Files';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('upload'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add File'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List File'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage File'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_file,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit File'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_file,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete File'));
								?>
								<a class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View File" href="image/files/<?php echo CHtml::encode($model->name); ?>"><i class="fa fa-link fa-lg"></i></a>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Upload',
									array('upload'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Upload File'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List File'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage File'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_file,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit File'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_file,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete File'));
															?>
															
															<?php if($model->status==0){ ?>

															<?php echo CHtml::link('<i class="fa fa-check"></i>', 
																array('publish', 'id'=>$model->id_file), 
																array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
																);
																?>	

																<?php }else{ ?>

																<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
																	array('default', 'id'=>$model->id_file), 
																	array('class' => 'btn btn-warning waves-effect waves-light tooltips', 'title'=>'Set Default')
																	);
																	?>		

																	<?php } ?>	

																	<a class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View File" href="<?php echo Yii::app()->baseUrl; ?>/image/files/<?php echo CHtml::encode($model->name); ?>"><i class="fa fa-link fa-lg"></i></a>

																</span>

																<HR>

																	<div class="well">
																		<input type="text" class="form-control input-lg" data-placement="top" data-toggle="tooltip" data-original-title="Copy Link" value="<?php echo Yii::app()->baseUrl; ?>/image/files/<?php echo CHtml::encode($model->name); ?>">
																	</div>

																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			'created_date',
																			'name',
																			'format',

																			array(
																				'label'=>'Category',
																				'value'=>$model->Category->name
																				),

																			array(
																				'label'=>'Uploaded by',
																				'value'=>$model->Member->first_name . " " . $model->Member->last_name
																				),

																			array(	
																				'name'=>'status',
																				'value'=>Post::model()->status($model->status),
																				),
																			),
																			)); ?>



																	<STYLE>
																		th{width:150px;}
																	</STYLE>

