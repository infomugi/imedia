<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
	);

$this->pageTitle='List Portofolio';
?>

<ul class="gallery-b">
	<?php foreach (Post::getPortofolioFull() as $data) { ?>   
		<li class="<?php echo $data["id_category"]; ?>">
			<img src="image/posting/middle/<?php echo $data["image"]; ?>" alt="<?php echo $data["title"]; ?>" width="360" height="270">
			<div>
				<h3><?php echo $data["title"]; ?></h3>				
				<p><?php echo $data["keyword"]; ?></p>
				<p class="link-b"><a href="article/<?php echo $data["url"]; ?>">View</a></p>
			</div>
			<span>Mobile</span>
		</li>
		<?php } ?>  
	</ul>
