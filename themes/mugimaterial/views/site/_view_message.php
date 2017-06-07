<?php
/* @var $this MessageController */
/* @var $data Message */
?>
<div class="inbox-item">
	<div class="inbox-item-img">
		<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/image.png" class="img-circle" alt="">
	</div><p class="inbox-item-author"><?php echo CHtml::link(CHtml::encode($data->name), array('message/view', 'id'=>$data->id_message)); ?></p>
	<p class="inbox-item-text"><?php echo CHtml::encode($data->message); ?></p>
	<p class="inbox-item-date format-date"><?php echo CHtml::encode($data->created_date); ?></p>
</div>


