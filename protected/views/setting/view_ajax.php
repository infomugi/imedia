<?php
/* @var $this SettingController */
/* @var $model Setting */

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
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_setting,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Setting'));
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
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_setting,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Setting'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'name',
																	'description',

																	array(	
																		'name'=>'type',
																		'value'=>Setting::model()->type($model->type),
																		),

																	array(	
																		'name'=>'status',
																		'value'=>Setting::model()->status($model->status),
																		),

																	array(
																		'name'=>'user_id',
																		'value'=>$model->Member->first_name . " " . $model->Member->last_name
																		),

																	'created_date',
																	'update_date'
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

