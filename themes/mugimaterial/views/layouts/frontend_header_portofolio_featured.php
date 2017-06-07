			<?php echo Yii::app()->db->createCommand("SELECT content FROM setting where id_setting=8")->queryScalar();?>

			<ul class="list-b">
				<li class="active"><a href="#" data-type="*">All</a></li>
				<?php foreach (Category::getCategory() as $data) { ?>   
					<li><a href="#" data-type=".<?php echo $data["id_category"]; ?>"><?php echo $data["name"]; ?></a></li>
					<?php } ?>  
				</ul>  