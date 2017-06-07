<?php
/* @var $this FilesController */
/* @var $data Files */
?>

<div class="col-sm-6 col-lg-4">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">
				<div class="pull-right btn-group-sm hidden-xs">
					<a class="btn btn-info waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View File" href="<?php echo Yii::app()->baseUrl; ?>/image/files/<?php echo CHtml::encode($data->name); ?>"><i class="fa fa-link fa-lg"></i></a>
					<?php echo CHtml::link('<i class="fa fa-file fa-lg"></i>', 
						array('view', 'id'=>$data->id_file), 
						array('class' => 'btn btn-info waves-effect waves-light tooltips', 'title'=>'View Info File')
						);
						?>													
						</div>

						<div class="info">
							<h4 data-placement="top" data-toggle="tooltip" data-original-title="<?php echo CHtml::encode($data->Category->name ." - " . $data->Member->first_name . " " . $data->Member->last_name); ?>">
							<?php if($data->status==1){ ?><i class="fa fa-file text-inverse"></i> <?php }else{ ?> <i class="fa fa-minus text-inverse"></i> <?php } ?> 
							<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id_file)); ?>
							</h4>
							<p class="text-muted"><?php echo CHtml::encode($data->created_date . " - " . $data->format . " - " . $data->Category->name, array('data-placement'=>'tooltip','data-original-title'=>$data->Member->first_name, 'data-placement'=>'top')); ?></p></div>
						</div>

					</div>
				</div>
			</div>					
