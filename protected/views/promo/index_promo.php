<?php
/* @var $this PromoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
	);

$this->pageTitle='Promo';
?>

<!-- START: Bagian Home Area - Parallax -->
<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=18 AND active=1" )->queryScalar();?>
<!-- END: Bagian Home Area - Parallax -->

<!-- START: Bagian Feature Area -->
<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=19 AND active=1" )->queryScalar();?>
<!-- END: Bagian Feature Area -->

<!-- START: Bagian Harga -->
<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=20 AND active=1" )->queryScalar();?>
<!-- END: Bagian Harga -->

<!-- START: Bagian Layanan Testimony -->
<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=21 AND active=1" )->queryScalar();?>
<!-- END: Bagian Layanan Testimony -->

<!-- START: Bagian Kontak Kami -->
<?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=22 AND active=1" )->queryScalar();?>
<!-- END: Bagian Kontak Kami -->