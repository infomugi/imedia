<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
	);

$this->pageTitle='Posts List';
?>

<section class="col-xs-12">

	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-plus"></i>',
			array('create'),
			array('class' => 'btn btn-primary btn-md','title'=>'Add Post'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('New',
				array('new'),
				array('class' => 'btn btn-primary btn-flat','title'=>'New Post'));
				?>

			</span>

			<HR>

				
				<?php
				foreach(Yii::app()->user->getFlashes() as $key =>$message)
				{
					echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
				}
				?>

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>