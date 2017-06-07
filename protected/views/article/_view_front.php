<?php
/* @var $this PostController */
/* @var $data Post */
?>

<article>
	<header>
		<h3 style="text-transform:capitalize"><?php echo CHtml::link(CHtml::encode($data->title), array('post', 'url'=>$data->url)); ?></h3>
		<ul>
			<li class="a"><i class="fa fa-user a"></i> <?php echo CHtml::link($data->Member->first_name ." ".$data->Member->last_name, array('profile/user', 'name'=>$data->Member->username)); ?></li>
			<li class="a"><i class="fa fa-calendar a"></i> <?php echo CHtml::encode($data->created_date); ?></li>
			<li class="a"><i class="fa fa-tags a"></i> <?php echo CHtml::link($data->Category->name, array('article/category', 'id'=>$data->id_category)); ?></li>
			<li class="a"><i class="fa fa-eye a"></i> <?php echo CHtml::encode($data->views); ?></li>
			<li class="a"><i class="fa fa-heart a"></i> <?php echo CHtml::encode($data->likes); ?></li>
			<li class="a"><i class="fa fa-thumbs-up a"></i> <?php echo CHtml::link('Like Post', array('article/likes', 'id'=>$data->id_post)); ?></li>
		</ul>	
	</header>
	<figure>
		<a class="zoomy" href="<?php echo Yii::app()->baseUrl; ?>/image/posting/big/<?php echo CHtml::encode($data->image); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/image/posting/middle/<?php echo CHtml::encode($data->image); ?>" alt="<?php echo CHtml::encode($data->tags); ?>" width="740" height="303"></a>
	</figure>
</article>


