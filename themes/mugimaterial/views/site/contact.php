<?php
/* @var $this SiteController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='Hubungi Kami';
?>
<article id="contact">
	<?php
	foreach(Yii::app()->user->getFlashes() as $key =>$message)
	{
		echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
	}
	?>
	<header>
		<h3>Kontak</h3>
		<p>Jl. Desa Panyirapan Soreang<br> Kab. Bandung - Jawa Barat Indonesia</p>
		<p class="link-c"><a href="http://facebook.com/mugirachmat">Facebook</a></p>
	</header>
	<?php echo $this->renderPartial('_form_contact', array('message'=>$message)); ?>
</article>