<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->id_testimonial,
	);

$this->pageTitle='Detail Testimonials';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Testimonials'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Testimonials'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Testimonials'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_testimonial,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Testimonials'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_testimonial,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Testimonials'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Add',
									array('create'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Add Testimonials'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List Testimonials'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage Testimonials'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_testimonial,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Testimonials'));
													?>
												</span>

												<HR>

													<div class="col-sm-12 col-lg-6">
														<div class="panel">
															<div class="panel-body">
																<div class="media-main">

																	<a class="pull-left" href="#" data-placement="top" data-toggle="tooltip" data-original-title="<?PHP echo $model->Customer->first_name; ?>">
																		<img class="thumb-lg img-circle" src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->Customer->image; ?>" alt="">
																	</a>

																	<div class="pull-right btn-group-sm hidden-xs">
																		<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
																			array('delete', 'id'=>$model->id_testimonial), 
																			array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Delete Testimonial')
																			);
																			?>		

																			<?php if($model->status==0){ ?>

																			<?php echo CHtml::link('<i class="fa fa-check"></i>', 
																				array('publish', 'id'=>$model->id_testimonial), 
																				array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Enable')
																				);
																				?>	

																				<?php }else{ ?>

																				<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
																					array('default', 'id'=>$model->id_testimonial), 
																					array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Disable')
																					);
																					?>		

																					<?php } ?>						
																				</div>

																				<div class="info">
																					<h4><?php echo CHtml::link(CHtml::encode($model->Customer->first_name), array('view', 'id'=>$model->id_testimonial)); ?>
																						<?php if($model->status==1): ?><i class="fa fa-check-circle text-info"></i> <?php endif; ?>
																					</h4>
																					<p class="text-muted">
																						<i class="fa fa-user a"></i> <?php echo CHtml::encode($model->Member->first_name ." ".$model->Member->last_name); ?> - 
																						<i class="fa fa-calendar a"></i> <?php echo CHtml::encode($model->created_date); ?> - 
																						<i class="fa fa-info a"></i> <?php echo CHtml::encode(Post::model()->status($model->status)); ?>
																					</p>
																					<p class="text-muted well"><?php echo CHtml::encode($model->description); ?></p>
																				</div>
																			</div>

																		</div>
																	</div>
																</div>		





