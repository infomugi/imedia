<?php
/* @var $this UsersController */
/* @var $model Users */
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
	'Users'=>array('index'),
	$model->username,
	);

$this->pageTitle='Detail Users';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add User'));
		?>

		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'Users List'));
			?>

			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Users'));
				?>

				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_user,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Profile'));
						?>

						<?php echo CHtml::link('<i class="fa fa-lock"></i>', 
							array('changepassword', 'id'=>$model->id_user,
								), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Password'));
								?>												

								<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
									array('delete', 'id'=>$model->id_user,
										),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Account'));
										?>

									</span> 

									<span class="hidden-xs">

										<?php echo CHtml::link('Add',
											array('create'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Add User'));
											?>

											<?php echo CHtml::link('List',
												array('index'),
												array('class' => 'btn btn-primary btn-flat', 'title'=>'Users List'));
												?>

												<?php echo CHtml::link('Manage',
													array('admin'),
													array('class' => 'btn btn-primary btn-flat','title'=>'Manage Users'));
													?>

													<?php echo CHtml::link('Edit', 
														array('update', 'id'=>$model->id_user,
															), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Profile'));
															?>

															<?php echo CHtml::link('Edit Password', 
																array('changepassword', 'id'=>$model->id_user,
																	), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Password'));
																	?>												

																	<?php echo CHtml::link('Delete', 
																		array('delete', 'id'=>$model->id_user,
																			),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Account'));
																			?>

																			<?php echo CHtml::link('View Details', 
																				array('view', 'id'=>$model->id_user,
																					),  array('class' => 'btn btn-warning btn-flat', 'title'=>'View Details'));
																					?>

																				</span>


																				<HR>

																					<!-- Start content -->
																					<div class="content">
																						<div class="wraper container-fluid">
																							<div class="row">
																								<div class="col-sm-12">
																									<div class="bg-picture text-center" style="background-image:url('<?php echo Yii::app()->baseUrl; ?>/image/cover/<?PHP echo $model->cover; ?>')">
																										<div class="bg-picture-overlay">
																										</div>
																										<div class="profile-info-name">
																											<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->image; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
																											<h3 class="text-white">
																												<?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?> <?php if($model->verified==1): ?><i class="fa fa-check-circle"></i> <?php endif; ?>
																											</h3>
																										</div>
																									</div>

																									<!--/ meta -->
																								</div>
																							</div>
																						</div>
																					</div>

