<?php
/* @var $this SettingController */
/* @var $dataProvider CActiveDataProvider */
$this->widget('ext.yii-toastr.MugiToastr', array(
	'flashMessagesOnly' => true, 
	'options' => array(
		"closeButton" => true,
		"debug" => true,
		"progressBar"=> true,
		"positionClass" => "toast-bottom-left",
		"showDuration" => "600",
		"hideDuration" => "1000",
		"timeOut" => "15000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
		)
	));

$this->breadcrumbs=array(
	'Settings',
	);

$dataProvider2=new CActiveDataProvider('Setting', array(
	'criteria'=>array(
		'condition'=>'status=2',
		'order'=>'name ASC',
		)
	));

$this->pageTitle='List Setting';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Setting'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Setting'));
			?>

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Add',
				array('create'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Add Setting'));
				?>
				<?php echo CHtml::link('Manage',
					array('admin'),
					array('class' => 'btn btn-primary btn-flat','title'=>'Manage Setting'));
					?>

				</span>

				<HR>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs tabs">
								<li class="active tab"><a href="#frontend" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
									<span class="hidden-xs">Frontend</span></a></li>

									<li class="tab"><a href="#backend" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
										<span class="hidden-xs">Backend</span></a>
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
									<div class="tab-pane active" id="frontend">
										<div class="row">
											<div class="col-md-12">
												<!-- Stats : Todak -->


												<?php $this->widget('zii.widgets.CListView', array(
													'dataProvider'=>$dataProvider,
													'itemView'=>'_view',
													)); ?>


												</div>
											</div>
										</div>
										<!-- END: TAB 1 -->

										<!-- END: TAB 2 -->
										<div class="tab-pane active" id="backend">
											<div class="row">
												<div class="col-md-12">
													<!-- Stats : Week -->

													<?php $this->widget('zii.widgets.CListView', array(
														'dataProvider'=>$dataProvider2,
														'itemView'=>'_view',
														)); ?>

													</div>
												</div>
											</div>
											<!-- END: TAB 2 -->


										</div>
									</div>
								</div>



