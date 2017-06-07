<?php
/* @var $this UsersController */
/* @var $model Users */
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
	'Users'=>array('index'),
	$model->username,
	);

$this->pageTitle='Detail Users';
?>



<div class="row">
	<div class="col-sm-12">
		<div class="bg-picture text-center" style="background-image:url('<?php echo Yii::app()->baseUrl; ?>/image/cover/<?PHP echo $model->cover; ?>')">
			<div class="bg-picture-overlay">
			</div>
			<div class="profile-info-name">
				<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->image; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
				<h3 class="text-white">
					<?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?> <?php if($model->verified==1): ?><i class="fa fa-check-circle"></i> <?php endif; ?>
				</h3>
			</div>
		</div>

		<!--/ meta -->
	</div>
</div>
<div class="row user-tabs">
	<div class="col-lg-6 col-md-9 col-sm-9">
		<ul class="nav nav-tabs tabs">
			<li class="active tab"><a href="#profile-2" data-toggle="tab" aria-expanded="false" class="active"><span class="visible-xs"><i class="fa fa-home"></i></span> 
				<span class="hidden-xs">Profile</span></a></li>

				<li class="tab"><a href="#activity-2" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-user"></i></span> 
					<span class="hidden-xs">Skills</span></a></li> 

					<?php if(YII::app()->user->id==$model->id_user): ?>
						<li class="tab"><a href="#projects-2" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
							<span class="hidden-xs">Activities</span></a>
						</li>
					<?php endif; ?>
					
					<li class="tab"><a href="#history-2" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-tasks"></i></span> 
						<span class="hidden-xs">History</span></a></li>

						<?php if(YII::app()->user->id==$model->id_user): ?>
							<li class="tab"><a href="#settings-2" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> 
								<span class="hidden-xs">Settings</span></a></li>
							<?php endif; ?>

							<div class="indicator">
							</div>
						</ul>
					</div>

					<div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
						<?php if(YII::app()->user->id==$model->id_user): ?>
							<div class="pull-right">
								<div class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#">Settings <span class="caret"></span></a>
									<?php
									$this->widget('zii.widgets.CMenu', array(
										'htmlOptions' => array('class' => 'dropdown-menu dropdown-menu-right'),
										'encodeLabel'=>FALSE,
										'items' => array(
											array('label' => '<i class="fa fa-user"></i> Profile', 'url' => array('/users/update','view'=>YII::app()->user->name), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-flash"></i> Skill', 'url' => array('skill/create','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-xing"></i> Experience', 'url' => array('experience/addexperience','id'=>$model->id_user,'type'=>3), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-xing"></i> Education', 'url' => array('experience/addeducation','id'=>$model->id_user,'type'=>4), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-camera"></i> Avatar', 'url' => array('changeimage','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-image"></i> Cover', 'url' => array('changecover','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-lock"></i> Password', 'url' => array('changepassword','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
											array('label' => '<i class="fa fa-power-off"></i> Logout', 'url' => array('/site/logout','id'=>YII::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
											array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
											)
));
?>    
</div>
</div>
<?php endif; ?>
</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="tab-content profile-tab-content">

			<!-- END: TAB 1 -->
			<div class="tab-pane active" id="profile-2">
				<div class="row">
					<div class="col-md-12">

						<div class="col-md-4">
							<!-- Personal-Information -->
							<div class="panel panel-default panel-fill">
								<div class="panel-heading">
									<h3 class="panel-title">Profile</h3>
								</div>
								<div class="panel-body">
									<span class="visible-xs">

										<?php echo CHtml::link('<i class="fa fa-flash"></i>',
											array('skill/create'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Add Skill'));
											?>		

											<?php echo CHtml::link('<i class="fa fa-user"></i>', 
												array('update', 'id'=>$model->id_user,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Profile'));
													?>

													<?php echo CHtml::link('<i class="fa fa-camera"></i>', 
														array('changeimage', 'id'=>$model->id_user,
															), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Avatar'));
															?>		

															<?php echo CHtml::link('<i class="fa fa-image"></i>', 
																array('changecover', 'id'=>$model->id_user,
																	), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Cover'));
																	?>		

																	<?php echo CHtml::link('<i class="fa fa-lock"></i>', 
																		array('changepassword', 'id'=>$model->id_user,
																			), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Password'));
																			?>												

																			<HR>
																			</span> 


																			<div class="about-info-p"><strong>Full Name</strong><br>
																				<p class="text-muted"><?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?></p></div>

																				<div class="about-info-p"><strong>Birth</strong><br>
																					<p class="text-muted"><?php echo CHtml::encode($model->birth); ?></p></div>

																					<div class="about-info-p"><strong>Email</strong><br>
																						<p class="text-muted"><?php echo CHtml::encode($model->email); ?></p>
																					</div>

																					<div class="about-info-p"><strong>Division</strong><br>
																						<p class="text-muted"><?php if($model->division==0){echo "Division not Found";}else{echo $model->Division->name;} ?></p>
																					</div>

																					<div class="about-info-p"><strong>Location</strong><br>
																						<p class="text-muted"><?php echo CHtml::encode($model->location); ?></p>
																					</div>

																				</div>
																			</div>
																		</div>


																		

																		<div class="col-md-8">
																			<!-- Biograpy-Information -->
																			<div class="panel panel-default panel-fill">
																				<div class="panel-heading">
																					<h3 class="panel-title">Biography</h3>
																				</div>
																				<div class="panel-body">
																					<p><?php echo CHtml::encode($model->bio); ?></p>
																				</div>
																			</div>



																			<div class="hidden-xs">

																				<!-- Reputation Information -->
																				<div class="col-md-6">
																					<div class="mini-stat clearfix bx-shadow bg-white">
																						<span class="mini-stat-icon bg-primary">
																							<i class="fa fa-star"></i>
																						</span>
																						<div class="mini-stat-info text-right text-dark">
																							<span class="counter text-dark">
																								<?php echo Yii::app()->db->createCommand("SELECT SUM(point) FROM activities WHERE user_id=".$model->id_user."")->queryScalar();?>
																							</span> Point
																						</div>
																					</div>
																				</div>

																				<!-- Profile Viewers Information -->
																				<div class="col-md-6 ">
																					<div class="mini-stat clearfix bx-shadow bg-white">
																						<span class="mini-stat-icon bg-primary">
																							<i class="fa fa-weibo"></i>
																						</span>
																						<div class="mini-stat-info text-right text-dark">
																							<span class="counter text-dark"><?php echo $model->views; ?>
																							</span> Profile Viewers
																						</div>
																					</div>
																				</div>

																			</div>

																		</div>

																		
																	</div>
																</div>
															</div>
															<!-- END: TAB 1 -->


															<!-- END: TAB 2 -->
															<div class="tab-pane active" id="activity-2">
																<div class="row">
																	<div class="col-md-12">
																		<!-- Users Activity -->

																		<div class="col-md-4">
																			<!-- Social Media -->
																			<div class="panel panel-default panel-fill">
																				<div class="panel-heading">
																					<h3 class="panel-title">Social Media</h3></div>
																					<div class="panel-body">

																						<div class="about-info-p"><strong><i class="fa fa-facebook"/></i> Facebook</strong><br>
																							<p class="text-muted"><?php echo CHtml::encode($model->facebook); ?></p></div>

																							<div class="about-info-p"><strong><i class="fa fa-twitter"/></i> Twitter</strong><br>
																								<p class="text-muted"><?php echo CHtml::encode($model->twitter); ?></p></div>

																								<div class="about-info-p"><strong><i class="fa fa-google-plus"/></i> Google Plus</strong><br>
																									<p class="text-muted"><?php echo CHtml::encode($model->gplus); ?></p></div>


																								</div>
																							</div>
																						</div>

																						<div class="col-md-8">
																							<!-- Personal-Information -->
																							<div class="panel panel-default panel-fill">
																								<div class="panel-heading">
																									<h3 class="panel-title">Skills</h3>
																								</div>

																								<div class="panel-body">


																									<?php 
																									$this->widget('zii.widgets.CListView', array(
																										'dataProvider'=>$dataSkill,
																										'itemView'=>'_view_skill',
																										'summaryText'=>''
																										)); 
																										?>

																									</div>
																								</div>
																							</div>


																						</div>
																					</div>
																				</div>
																				<!-- END: TAB 2 -->

																				<!-- END: TAB 3 -->
																				<?php if(YII::app()->user->id==$model->id_user): ?>
																					<div class="tab-pane active" id="projects-2">
																						<div class="row">
																							<div class="col-md-12">
																								<!-- Users Activity -->
																								<div class="col-md-12">
																									<div class="panel panel-default panel-fill">
																										<div class="panel-heading">
																											<h3 class="panel-title">Activity</h3>
																										</div>
																										<div class="panel-body">

																											<?php 
																											$this->widget('zii.widgets.CListView', array(
																												'dataProvider'=>$dataActivity,
																												'itemView'=>'_view_activity',
																												'summaryText'=>''
																												)); 
																												?>

																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					<?php endif; ?>
																					<!-- END: TAB 3 -->

																					<!-- END: TAB 3 -->
																					<div class="tab-pane active" id="history-2">
																						<div class="row">
																							<!-- Users Activity -->
																							<div class="col-md-12">
																								<div class="col-md-12">
																									<div class="panel panel-default panel-fill">
																										<div class="panel-heading">
																											<h3 class="panel-title">Experience</h3>
																										</div>
																										<div class="panel-body">

																											<?php $this->widget('zii.widgets.grid.CGridView', array(
																												'id'=>'experience-grid',
																												'dataProvider'=>$dataExperience,
																												'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
																												'columns'=>array(

																													array(
																														'header'=>'No',
																														'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
																														'htmlOptions'=>array('width'=>'10px', 
																															'style' => 'text-align: center;')),

																													'date',
																													'name',
																													'description',

																													// array(    
																													// 	'header'=>'Up',
																													// 	'type'=>'raw', 
																													// 	'value'=>'CHtml::link("Up", array("experience/up", "id"=>$data->id_experience))',
																													// 	),  

																													// array(    
																													// 	'header'=>'Down',
																													// 	'type'=>'raw', 
																													// 	'value'=>'CHtml::link("Down", array("experience/down", "id"=>$data->id_experience))',
																													// 	),  

																														array(
																																'class'=>'CButtonColumn',
																																'template'=>'{view}',
																																'buttons'=>array(
																																	'view'=>
																																	array(
																																		'url'=>'Yii::app()->createUrl("experience/view", array("id"=>$data->id_experience))',
																																		'options'=>array(
																																			'ajax'=>array(
																																				'type'=>'POST',
																																				'url'=>"js:$(this).attr('href')",
																																				'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
																																				),
																																			),
																																		),
																																	),
																																),
																														
																													),
																													)); ?>


																												</div>
																											</div>

																											<div class="panel panel-default panel-fill">
																												<div class="panel-heading">
																													<h3 class="panel-title">Education</h3>
																												</div>
																												<div class="panel-body">

																													<?php $this->widget('zii.widgets.grid.CGridView', array(
																														'id'=>'experience-grid',
																														'dataProvider'=>$dataEducation,
																														'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
																														'columns'=>array(

																															array(
																																'header'=>'No',
																																'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
																																'htmlOptions'=>array('width'=>'10px', 
																																	'style' => 'text-align: center;')),

																															'date',
																															'name',

																															'description',

																															// array(    
																															// 	'header'=>'Up',
																															// 	'type'=>'raw', 
																															// 	'value'=>'CHtml::link("Up", array("experience/up", "id"=>$data->id_experience))',
																															// 	),  

																															// array(    
																															// 	'header'=>'Down',
																															// 	'type'=>'raw', 
																															// 	'value'=>'CHtml::link("Down", array("experience/down", "id"=>$data->id_experience))',
																															// 	),  

																															array(
																																'class'=>'CButtonColumn',
																																'template'=>'{view}',
																																'buttons'=>array(
																																	'view'=>
																																	array(
																																		'url'=>'Yii::app()->createUrl("experience/view", array("id"=>$data->id_experience))',
																																		'options'=>array(
																																			'ajax'=>array(
																																				'type'=>'POST',
																																				'url'=>"js:$(this).attr('href')",
																																				'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
																																				),
																																			),
																																		),
																																	),
																																),

																															),
																															)); ?>


																														</div>
																													</div>
																												</div>
																											</div>
																										</div>
																									</div>
																									<!-- END: TAB 3 -->																					

																									<!-- END: TAB 4 -->
																									<?php if(YII::app()->user->id==$model->id_user): ?>
																										<div class="tab-pane active" id="settings-2">
																											<div class="row">
																												<div class="col-md-12">
																													<!-- Settings-Personal-Information -->
																													<div class="col-md-12">
																														<div class="panel panel-default panel-fill">
																															<div class="panel-heading">
																																<h3 class="panel-title">Activity</h3>
																															</div>
																															<div class="panel-body">
																																<?php  $this->renderPartial('_form_update',array(
																																	'model'=>$model,
																																	)); ?>
																																</div>
																															</div>
																														</div>
																													</div>
																												</div>
																											</div>
																										<?php endif; ?>
																										<!-- END: TAB 4 -->
																									</div>
																								</div>
																							</div>


																							<!-- Modal -->
																							<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																								<div class="modal-dialog">
																									<div class="modal-content">
																										<!-- Popup Header -->
																										<div class="modal-header">
																											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																											<h4 class="modal-title"><strong>View</strong> Experience</h4>
																										</div>
																										<!-- Popup Content -->
																										<div class="modal-body">
																											<p>Details</p>
																										</div>
																										<!-- Popup Footer -->
																										<div class="modal-footer">
																											<BR>
																												<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
																											</div>
																										</div>
																									</div>
																								</div>
