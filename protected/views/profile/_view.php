<div class="col-sm-6 col-lg-4">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">

				<a class="pull-left" href="##">
					<img class="thumb-lg img-circle" src="./image/avatar/<?PHP echo $data->image; ?>" alt="">
				</a>

				<div class="pull-right btn-group-sm hidden-xs">
					<?php echo CHtml::link('<i class="fa fa-pencil"></i>', 
						array('update', 'id'=>$data->id_user,
							), array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Edit Profile'));
							?>
					<?php echo CHtml::link('<i class="fa fa-eye"></i>', 
						array('view', 'id'=>$data->id_user,
							), array('class' => 'btn btn-info waves-effect waves-light tooltips', 'title'=>'View Profile'));
							?>							
						</div>

						<div class="info">
							<h4><?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id_user)); ?> 
								<?php if($data->verified==1): ?><i class="fa fa-check-circle text-info"></i> <?php endif; ?>
							</h4>
							<p class="text-muted"><?php echo CHtml::encode($data->email); ?></p></div>
						</div>

					</div>
				</div>
			</div>