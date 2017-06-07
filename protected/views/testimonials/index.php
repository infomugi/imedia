<?php
/* @var $this TestimonialsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Testimonials',
	);

$this->pageTitle='List Testimonials';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Testimonials'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Testimonials'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Add',
				array('create'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Add Testimonials'));
				?>

				<?php echo CHtml::link('Manage',
					array('admin'),
					array('class' => 'btn btn-primary btn-flat','title'=>'Manage Testimonials'));
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

