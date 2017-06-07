<?php
/* @var $this SkillController */
/* @var $model Skill */

$this->breadcrumbs=array(
	'Skill'=>array('users/view', 'id'=>$model->user_id),
	$model->Member->first_name .' '.$model->Member->last_name,
	);

$this->pageTitle=$model->Member->first_name . ' Skill ' . $model->skill;
?>
<?php if(YII::app()->user->id==$model->user_id): ?>
	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-user"></i>', 
			array('users/view', 'id'=>$model->user_id,
				), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Skill'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_skill,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Skill'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_skill,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Skill'));
								?>

							</span> 

							<span class="hidden-xs">

								<?php echo CHtml::link('<i class="fa fa-user"></i> My Profile', 
									array('users/view', 'id'=>$model->user_id,
										), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Skill'));
										?>
										<?php echo CHtml::link('Edit', 
											array('update', 'id'=>$model->id_skill,
												), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Skill'));
												?>
												<?php echo CHtml::link('Delete', 
													array('delete', 'id'=>$model->id_skill,
														),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Skill'));
														?>

													</span>

													<HR>

													<?php endif; ?>


													<div class="col-md-8 col-sm-10 col-lg-12">
														<div class="mini-stat clearfix">
															<span class="mini-stat-icon">
																<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo $model->Member->image; ?>" alt="" class="img-circle img-responsive"></span>
																<div class="mini-stat-info text-right text-dark">
																	<span class="name text-dark">
																	</span>
																	<b><?php echo $model->skill; ?></b>
																	<BR> 
																		Skill Percentage - <?php echo $model->percentage; ?>%
																	</div>
																</div>
															</div>

