<?php
/* @var $this UsersController */
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
	'Users',
	);

$this->pageTitle='Users List';
?>

<section class="col-xs-12">

	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-plus"></i>',
			array('create'),
			array('class' => 'btn btn-primary btn-md','title'=>'Add User'));
			?>

			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-md','title'=>'Manage Users'));
				?>

				<?php echo CHtml::link('<i class="fa fa-suitcase"></i>',
					array('division/admin'),
					array('class' => 'btn btn-primary btn-md','title'=>'Manage Division'));
					?>				

				</span> 

				<span class="hidden-xs">

					<?php echo CHtml::link('New',
						array('create'),
						array('class' => 'btn btn-primary btn-flat','title'=>'New User'));
						?>

						<?php echo CHtml::link('Manage',
							array('admin'),
							array('class' => 'btn btn-primary btn-flat','title'=>'Manage User'));
							?>

							<?php echo CHtml::link('Manage Division',
								array('division/admin'),
								array('class' => 'btn btn-primary btn-md','title'=>'Manage Division'));
								?>		

							</span>


							<HR>

								<?php $this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$dataProvider,
									'itemView'=>'_view',
									)); ?>

								</section>