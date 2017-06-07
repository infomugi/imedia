<div class="timeline-2">
	<div class="time-item">
		<div class="item-info">
		<div class="text-muted format-date"><?php echo CHtml::encode($data->created_date); ?></div>
			<p><strong><a href="#" class="text-info"><?php echo CHtml::encode($data->Member->username); ?></a></strong> 
				<?php echo CHtml::encode(Activities::model()->activityDescription($data->type)); ?> - <strong>"<?php echo CHtml::encode($data->description); ?>"</strong>
			</p>
		</div>
	</div>
</div>