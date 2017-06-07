<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
		),
	'errorMessageCssClass' => 'label label-danger',
	'htmlOptions' => array('class' => 'conForm', 'role' => 'form')
	)); ?>

	<?php //echo $form->errorSummary($message, null, null, array('class' => 'alert alert-warning')); ?>

	<?php echo $form->error($message,'name'); ?>
	<?php echo $form->textField($message,'name',array('class'=>'col-xs-12 col-sm-6 col-md-6 col-lg-6','placeholder'=>'Your name...')); ?>


	<?php echo $form->error($message,'email'); ?>
	<?php echo $form->textField($message,'email',array('class'=>'col-xs-12 col-sm-6 col-md-6 col-lg-6 noMarr','placeholder'=>'Your email...')); ?>

	<?php echo $form->error($message,'message'); ?>
	<?php echo $form->textArea($message,'message',array('class'=>'col-xs-12 col-sm-12 col-md-12 col-lg-12','placeholder'=>'Your message...')); ?>       </div>

	<?php echo CHtml::submitButton($message->isNewRecord ? 'Send' : 'Edit', array('class' => 'submitBnt btn btn-danger pull-right','id'=>'tombol')); ?>

	<?php $this->endWidget(); ?>
