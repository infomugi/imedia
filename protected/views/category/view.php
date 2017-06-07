<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Category - '.$model->name;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Category'));
		?>
		<?php echo CHtml::link('<i class="fa fa-task"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Category'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Category'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_category,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Category'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_category,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Category'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Add Category'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List Category'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage Category'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_category,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Category'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_category,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Category'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'name',
																	'description',
																	'icon',
																	array(	
																		'name'=>'status',
																		'value'=>Post::model()->status($model->status),
																		),
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

