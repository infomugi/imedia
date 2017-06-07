<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="col-xs-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
				<div id="post" style="text-transform:capitalize;">
					<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id_post)); ?>
				</div>
			</div>
			<div class="box-body">
				<H4>
					<i class="fa fa-user a"></i> <?php echo CHtml::encode($data->Member->first_name ." ".$data->Member->last_name); ?> - 
					<i class="fa fa-calendar a"></i> <?php echo CHtml::encode($data->created_date); ?> - 
					<i class="fa fa-tags a"></i> <?php echo CHtml::encode($data->Category->name); ?> - 
					<i class="fa fa-info a"></i> <?php echo CHtml::encode(Post::model()->status($data->status)); ?>
				</H4>
				<div style="text-align:justify;">
					<?php echo $data->description; ?>
				</div>
			</div>
		</div>
		<HR>
	</div>
