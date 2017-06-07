<?php
/* @var $this FilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Files',
	);

$this->pageTitle='List Files';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('upload'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Files'));
		?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Upload',
				array('upload'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Upload Files'));
				?>

				</span>

				<HR>

					<?php $this->widget('zii.widgets.CListView', array(
						'dataProvider'=>$dataMyfiles,
						'itemView'=>'_view',
						)); ?>


