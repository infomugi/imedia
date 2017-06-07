<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Home - Facebook';
$this->breadcrumbs=array(
	'Home - Facebook',
  );
  ?>

 ID : <?php echo $socialUser->identifier; ?>;
 
Nama : <?php echo $socialUser->displayName; ?>;
 
Email : <?php echo $socialUser->email; ?>;
 
Facebook Profile : <?php echo $socialUser->profileURL; ?>;
 
<?php echo CHtml::image($socialUser->photoURL); ?>