<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Post';

// Yii::app()->clientScript->registerScript('ajaxupdate', "
// $('#post-grid a.ajaxupdate').live('click', function() {
//         $.fn.yiiGridView.update('post-grid', {
//                 type: 'POST',
//                 url: $(this).attr('href'),
//                 success: function() {
//                         $.fn.yiiGridView.update('post-grid');
//                 }
//         });
//         return false;
// });
// ");
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-md','title'=>'Add Post'));
		?>

		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-md','title'=>'Posts List'));
			?>

			<?php echo CHtml::link('<i class="fa fa-tags"></i>',
				array('category/admin'),
				array('class' => 'btn btn-primary btn-md','title'=>'Category List'));
				?>

			</span> 

			<span class="hidden-xs">

				<?php echo CHtml::link('New',
					array('create'),
					array('class' => 'btn btn-primary btn-flat','title'=>'New Post'));
					?>

					<?php echo CHtml::link('List',
						array('index'),
						array('class' => 'btn btn-primary btn-flat','title'=>'Posts List'));
						?>

						<?php echo CHtml::link('Category',
							array('category/admin'),
							array('class' => 'btn btn-primary btn-md','title'=>'Category List'));
							?>

						</span>


						<HR>

							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'post-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
								'columns'=>array(

									array(
										'header'=>'No',
										'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
										'htmlOptions'=>array('width'=>'10px', 
											'style' => 'text-align: center;')),

									array(
										'name'=>'id_user',
										'value'=>'$data->Member->first_name ." ".$data->Member->last_name'
										),									

									'created_date',
									'title',

									array(	
										'name'=>'status',
										'filter'=>array('0'=>'Disable','1'=>'Enable'),
										'value'=>'Post::model()->status($data->status)',
										),

									// array(
									// 	'name'=>'status',
									// 	'type'=>'raw',
									// 	'value'=>'CHtml::link(Post::model()->status($data->status), array("updateStats", "id"=>$data->id_post), array("class"=>"ajaxupdate"));',
									// ),									

									array(
										'class'=>'CButtonColumn',
										'template'=>'{view}{delete}',
										'buttons'=>array(
											'view'=>
											array(
												'url'=>'Yii::app()->createUrl("post/view", array("id"=>$data->id_post))',
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


									<!-- Modal -->
									<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<!-- Popup Header -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title"><strong>View</strong> Post</h4>
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





