<?php
/* @var $this DivisionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Divisions',
	);

$this->pageTitle='List Division';
?>

<section class="col-xs-12">

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-md'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-md'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Add Division',
				array('create'),
				array('class' => 'btn btn-primary btn-flat'));
				?>
				<?php echo CHtml::link('Manage Division',
					array('admin'),
					array('class' => 'btn btn-primary btn-flat'));
					?>

				</span>	
			<HR>

				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
					)); ?>

				</section>