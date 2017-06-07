<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="col-sm-6 col-lg-4">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">

				<a class="pull-left" href="#" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->description); ?>">
					<center>
						<H1>
							<i class="<?php echo CHtml::encode($data->icon); ?>"></i>
						</H1>
					</center>
				</a>

				<div class="pull-right btn-group-sm hidden-xs">

					<?php if($data->status==0){ ?>

					<?php echo CHtml::link('<i class="fa fa-check"></i>', 
						array('publish', 'id'=>$data->id_category), 
						array('class' => 'btn btn-success waves-effect waves-light tooltips', 'title'=>'Publish')
						);
						?>	

						<?php }else{ ?>

						<?php echo CHtml::link('<i class="fa fa-minus-square"></i>', 
							array('default', 'id'=>$data->id_category), 
							array('class' => 'btn btn-warning waves-effect waves-light tooltips', 'title'=>'Set Default')
							);
							?>		

							<?php } ?>							

							</div>

							<div class="info">
								<h4><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id_category)); ?>
									<?php if($data->status==1): ?><i class="fa fa-check-circle text-info"></i> <?php endif; ?>
								</h4>
								<p class="text-muted"><?php echo CHtml::encode(Post::model()->status($data->status)); ?></p></div>
							</div>

						</div>
					</div>
				</div>		