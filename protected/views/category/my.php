<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
	);

$this->pageTitle='List Category';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('new'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Category'));
		?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('New',
			array('new'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Add Category'));
			?>
			
		</span>

		<HR>

			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
				)); ?>

