<div class="col-sm-6 col-lg-4">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">

				<a class="pull-left" href="##">
					<img class="thumb-lg img-circle" src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $data->image; ?>" alt="">
				</a>

				<div class="pull-right btn-group-sm hidden-xs">

					<?php if($data->verified==0){ ?>

					<?php echo CHtml::link('<i class="fa fa-check"></i>', 
						array('team', 'id'=>$data->id_user), 
						array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Set Team')
						);
						?>	

						<?php }else{ ?>

						<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
							array('default', 'id'=>$data->id_user), 
							array('class' => 'btn btn-warning waves-effect waves-light tooltips', 'title'=>'Set Default')
							);
							?>		

							<?php } ?>

							<?php if($data->level==1){ ?>

								<?php echo CHtml::link('<i class="fa fa-users"></i>', 
									array('setuser', 'id'=>$data->id_user), 
									array('class' => 'btn btn-warning waves-effect waves-light tooltips', 'title'=>'Set as User')
									);
									?>		

								<?php }else{ ?>

							<?php echo CHtml::link('<i class="fa fa-user"></i>', 
								array('setadmin', 'id'=>$data->id_user), 
								array('class' => 'btn btn-info waves-effect waves-light tooltips', 'title'=>'Set as Administrator')
								);
								?>	

									<?php } ?>							

								</div>

								<div class="info">
									<h4><?php echo CHtml::link(CHtml::encode($data->username), array('profile', 'view'=>$data->username)); ?> 
										<?php if($data->verified==1): ?><i class="fa fa-check-circle text-info"></i> <?php endif; ?>
									</h4>
									<p class="text-muted format-date"><?php echo CHtml::encode($data->last_visit); ?></p></div>
								</div>

							</div>
						</div>
					</div>