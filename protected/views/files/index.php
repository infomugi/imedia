<?php
/* @var $this FilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Files',
	);

$dataMyfiles=new CActiveDataProvider('Files',array(
	'criteria'=>array(
		'condition'=>'user_id = '.YII::app()->user->id,
		'order'=>'created_date DESC'
		)
	));	

$this->pageTitle='List Files';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('upload'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Files'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Files'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Upload',
				array('upload'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Upload Files'));
				?>
				<?php echo CHtml::link('Manage',
					array('admin'),
					array('class' => 'btn btn-primary btn-flat','title'=>'Manage Files'));
					?>

				</span>

				<HR>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs tabs">
								<li class="active tab"><a href="#myfiles" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
									<span class="hidden-xs">My Files</span></a></li>

									<li class="tab"><a href="#all" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
										<span class="hidden-xs">All Files</span></a>
									</li>

									<div class="indicator">
									</div>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="tab-content profile-tab-content">

									<!-- END: TAB 1 -->
									<div class="tab-pane active" id="myfiles">
										<div class="row">
											<div class="col-md-12">
												<!-- Stats : Todak -->


												<?php $this->widget('zii.widgets.CListView', array(
													'dataProvider'=>$dataMyfiles,
													'itemView'=>'_view',
													)); ?>


												</div>
											</div>
										</div>
										<!-- END: TAB 1 -->

										<!-- END: TAB 2 -->
										<div class="tab-pane active" id="all">
											<div class="row">
												<div class="col-md-12">
													<!-- Stats : Week -->

													<?php $this->widget('zii.widgets.CListView', array(
														'dataProvider'=>$dataProvider,
														'itemView'=>'_view',
														)); ?>

													</div>
												</div>
											</div>
											<!-- END: TAB 2 -->


										</div>
									</div>
								</div>




