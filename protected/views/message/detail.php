<?php
/* @var $this MessageController */
/* @var $model Message */
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
	'Messages'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Message';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('sendto'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Send Message'));
		?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Message'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Message'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_message,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Message'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_message,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Message'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('Send',
									array('sendto'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Send Message'));
									?>
									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List Message'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage Message'));
											?>
											
										</span>

										<HR>

											<div class="col-sm-12 col-lg-6">
												<div class="panel">
													<div class="panel-body">
														<div class="media-main">

															<a class="pull-left" href="#" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($model->name); ?> - <?php echo CHtml::encode($model->email); ?>">
																<img class="thumb-lg img-circle" src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="">
															</a>

															<div class="pull-right btn-group-sm hidden-xs">
																<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
																	array('delete', 'id'=>$model->id_message), 
																	array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Delete Message')
																	);
																	?>							
																</div>

																<div class="info">
																	<h4>To : 
																		<?php echo CHtml::encode($model->Member->first_name ." ".$model->Member->last_name); ?> 
																		<?php if($model->status==1): ?><i class="fa fa-check-circle text-info"></i> <?php endif; ?>
																	</h4>
																	<p class="text-muted"><i class="fa fa-user"></i> <?php echo CHtml::encode($model->name); ?> - <i class="fa fa-calendar"></i> <?php echo CHtml::encode($model->created_date); ?> - <i class="fa fa-envelope"></i> <?php echo CHtml::encode($model->email); ?></p>
																	<p class="text-muted well"><?php echo CHtml::encode($model->message); ?></p>
																</div>
															</div>

														</div>
													</div>
												</div>		



												