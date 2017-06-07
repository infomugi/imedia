<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
	);

$link = Yii::app()->baseUrl."/article/".$model->url;

$this->pageTitle=$model->title;
$this->tags=$model->tags;
$this->keyword=$model->keyword;

$this->url=$link;
$this->image=$model->image;
?>


<article>
	<header>
		<h3 style="text-transform:capitalize"><?php echo CHtml::encode($model->title); ?></h3>
		<ul>
			<li class="a"><i class="fa fa-user a"></i> <?php echo CHtml::link($model->Member->first_name ." ".$model->Member->last_name, array('profile/user', 'name'=>$model->Member->username)); ?></li>
			<li class="a"><i class="fa fa-calendar a"></i> <?php echo CHtml::encode($model->created_date); ?></li>
			<li class="a"><i class="fa fa-tags a"></i> <?php echo CHtml::link($model->Category->name, array('article/category', 'id'=>$model->id_category)); ?></li>
			<li class="a"><i class="fa fa-eye a"></i> <?php echo CHtml::encode($model->views); ?></li>
			<li class="a"><i class="fa fa-heart a"></i> <?php echo CHtml::encode($model->likes); ?></li>
			<li class="a"><i class="fa fa-thumbs-up a"></i> <?php echo CHtml::link('Like Post', array('article/likes', 'id'=>$model->id_post)); ?></li>
		</ul>	
	</header>
	<figure>
		<a class="zoomy" href="<?php echo Yii::app()->baseUrl; ?>/image/posting/big/<?php echo CHtml::encode($model->image); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/image/posting/middle/<?php echo CHtml::encode($model->image); ?>" alt="<?php echo CHtml::encode($model->tags); ?>" width="740" height="303"></a>
	</figure>	
	<p><?php echo $model->description; ?></p>
</article>


