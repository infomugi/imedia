<div class="m-b-15">
	<h5><?php echo CHtml::link(CHtml::encode($data->skill), array('skill/view', 'id'=>$data->id_skill)); ?> <span class="pull-right"><?php echo CHtml::encode($data->percentage); ?>%</span></h5>
	<div class="progress"><div class="progress-bar progress-bar-<?php echo Skill::model()->colorStatus($data->color); ?> wow animated progress-animated animated" role="progressbar" aria-valuenow="<?php echo CHtml::encode($data->percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo CHtml::encode($data->percentage); ?>%; visibility: visible; animation-name: animationProgress;">
		<span class="sr-only"><?php echo CHtml::encode($data->percentage); ?>% Complete</span>
	</div>
</div>
</div>