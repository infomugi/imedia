<?php
/* @var $this ExperienceController */
/* @var $model Experience */

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
	'Experiences'=>array('users/profile', 'view'=>$model->Member->username),
	$model->Member->first_name .' '.$model->Member->last_name,
	);

$this->pageTitle=Experience::model()->type($model->type) . ' - ' . $model->Member->first_name;
?>

<?php if(YII::app()->user->id==$model->user_id): ?>

	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-user"></i>',
			array('users/profile', 'view'=>$model->Member->username),
			array('class' => 'btn btn-primary btn-flat','title'=>'My Profile'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_experience,'type'=>$model->type,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Experience'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_experience,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Experience'));
							?>

							<?php if($model->status==0){ ?>

							<?php echo CHtml::link('<i class="fa fa-check"></i>', 
								array('publish', 'id'=>$model->id_experience), 
								array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
								);
								?>	

								<?php }else{ ?>

								<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
									array('default', 'id'=>$model->id_experience), 
									array('class' => 'btn btn-warning waves-effect waves-light tooltips', 'title'=>'Set Default')
									);
									?>		

									<?php } ?>	

								</span> 

								<span class="hidden-xs">
									<?php echo CHtml::link('My Profile',
										array('users/profile', 'view'=>$model->Member->username),
										array('class' => 'btn btn-primary btn-flat','title'=>'My Profile'));
										?>
										<?php echo CHtml::link('Edit', 
											array('update', 'id'=>$model->id_experience, 'type'=>$model->type,
												), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Experience'));
												?>
												<?php echo CHtml::link('Delete', 
													array('delete', 'id'=>$model->id_experience,
														),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Experience'));
														?>

														<?php if($model->status==0){ ?>

														<?php echo CHtml::link('<i class="fa fa-check"></i>', 
															array('publish', 'id'=>$model->id_experience), 
															array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
															);
															?>	

															<?php }else{ ?>

															<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
																array('default', 'id'=>$model->id_experience), 
																array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Set Default')
																);
																?>		

																<?php } ?>	

															</span>


															<?php endif; ?>

															<div class="col-md-12 col-sm-11 col-lg-12">
																<div class="mini-stat clearfix">
																	<span class="mini-stat-icon">
																		<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo CHtml::encode($model->Member->image); ?>" alt="<?php echo CHtml::encode($model->Member->image); ?> Avatar" class="img-circle thumb-lg"></span>

																		<div class="mini-stat-info text-right text-dark">
																			<span class="name text-dark">
																			</span>
																			<b><?php echo Experience::model()->type($model->type) ?></b>
																			<BR> 
																			<?php echo $model->Division->name; ?> - <?php echo $model->date; ?>
																			<BR> 
																			<b><?php echo $model->name; ?></b>
																			<BR>
																			<?php echo $model->description; ?>
																		</div>

																	</div>
																</div>



	

