<?php
/* @var $this MessageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Messages',
	);

$this->pageTitle='List Message';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('sendto'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Send Message'));
		?>

		<?php 
		// echo CHtml::link('<i class="fa fa-remove"></i>',
		// 	array('clearall'),
		// 	array('class' => 'btn btn-danger btn-flat','title'=>'Clear Message'));
			?>		

		</span> 

		<span class="hidden-xs">

			<?php echo CHtml::link('Send',
				array('sendto'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Send Message'));
				?>

				<?php 
				// echo CHtml::link('Clear All',
				// 	array('clearall','name'=>YII::app()->user->name),
				// 	array('class' => 'btn btn-danger btn-flat','title'=>'Clear Message'));
					?>					

				</span>

				<HR>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs tabs">

								<li class="active tab"><a href="#send" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
									<span class="hidden-xs">Send</span></a></li>

									<li class="active tab"><a href="#inbox" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
										<span class="hidden-xs">Inbox</span></a></li>

										<li class="tab"><a href="#all" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-bar-chart-o"></i></span> 
											<span class="hidden-xs">All</span></a>
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
										<div class="tab-pane active" id="send">
											<div class="row">
												<div class="col-md-12">
													<!-- Message : Unread -->
													<div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
														<?php $this->widget('zii.widgets.CListView', array(
															'dataProvider'=>$dataSend,
															'itemView'=>'_view',
															)); ?>
														</div>
													</div>
												</div>
											</div>
											<!-- END: TAB 1 -->									

										<!-- END: TAB 2 -->
										<div class="tab-pane active" id="inbox">
											<div class="row">
												<div class="col-md-12">
													<!-- Message : Unread -->
													<div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
														<?php $this->widget('zii.widgets.CListView', array(
															'dataProvider'=>$dataInbox,
															'itemView'=>'_view',
															)); ?>
														</div>
													</div>
												</div>
											</div>
											<!-- END: TAB 2 -->

											<!-- END: TAB 3 -->
											<div class="tab-pane active" id="all">
												<div class="row">
													<div class="col-md-12">
														<!-- Message : Read -->
														<div class="inbox-widget nicescroll mx-box" tabindex="5000" style="overflow: hidden; outline: none;">
															<?php $this->widget('zii.widgets.CListView', array(
																'dataProvider'=>$dataAll,
																'itemView'=>'_view',
																)); ?>
															</div>
														</div>
													</div>
												</div>
												<!-- END: TAB 3 -->


											</div>
										</div>
									</div>

