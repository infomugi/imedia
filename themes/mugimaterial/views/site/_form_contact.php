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

	<?php echo $form->errorSummary($message, null, null, array('class' => 'alert alert-warning')); ?>
	<fieldset>
		<p>
			<?php echo $form->error($message,'name'); ?>
			<?php echo $form->textField($message,'name',array('placeholder'=>'Nama Lengkap')); ?>
		</p>
		<p>
			<?php echo $form->error($message,'email'); ?>
			<?php echo $form->textField($message,'email',array('placeholder'=>'Alamat Email')); ?>
		</p>
		<p>
			<?php echo $form->error($message,'message'); ?>
			<?php echo $form->textArea($message,'message',array('placeholder'=>'Apa yang anda tanyakan ?')); ?>
		</p>
		<p>
			<?php echo CHtml::submitButton($message->isNewRecord ? 'Kirim Pesan' : 'Edit', array('class' => 'a','id'=>'tombol')); ?>
		</p>
	</fieldset>
	<?php $this->endWidget(); ?>





