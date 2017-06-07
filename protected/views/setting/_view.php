<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="col-sm-6 col-lg-4">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">
				<div class="pull-right btn-group-sm hidden-xs">
					<?php if($data->active==0){ ?>
					<?php echo CHtml::link('<i class="fa fa-check"></i>', 
						array('publish', 'id'=>$data->id_setting), 
						array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
						);
						?>	
						<?php }else{ ?>
						<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
							array('default', 'id'=>$data->id_setting), 
							array('class' => 'btn btn-danger waves-effect waves-light tooltips', 'title'=>'Set Default')
							);
							?>		
							<?php } ?>								
						</div>

						<div class="info">
							<h4 data-placement="top" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->description); ?>">
							<?php if($data->active==1){ ?><i class="fa fa-html5 text-inverse"></i> <?php }else{ ?> <i class="fa fa-css3 text-inverse"></i> <?php } ?> 
							<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id_setting)); ?>
							</h4>
							<p class="text-muted"><?php echo CHtml::encode($data->description, array('data-placement'=>'tooltip','data-original-title'=>$data->Member->first_name, 'data-placement'=>'top')); ?></p>
							</div>
						</div>

					</div>
				</div>
			</div>					
