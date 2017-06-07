<?php
/* @var $this MessageController */
/* @var $data Message */
?>
<div class="inbox-item">
	<div class="inbox-item-img">
		<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo CHtml::encode($data->Member->image); ?>" alt="<?php echo CHtml::encode($data->Member->image); ?> Avatar" class="img-circle">
	</div><p class="inbox-item-author"><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id_message)); ?></p>
	<p class="inbox-item-text"><?php echo CHtml::encode($data->message); ?></p>
	<p class="inbox-item-date format-date"><?php echo CHtml::encode($data->created_date); ?></p>
</div>

