				<aside>
					<nav class="nav-a">
						<h3>Categories</h3>
						<ul>
							<?php foreach (Category::getCategory() as $data) { ?>   
								<li><a href="<?php echo Yii::app()->baseUrl; ?>/article/category/name/<?php echo strtolower($data["name"]); ?>" title="<?php echo $data["description"]; ?>"><?php echo $data["name"]; ?> <span><i class="fa-lg <?php echo $data["icon"]; ?>"></i></span></a></li>
                       		 <?php } ?>  
						</ul>
					</nav>
				</aside>