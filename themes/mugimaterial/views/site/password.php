<?php
/* @var $this UsersController */
/* @var $model Users */
$this->pageTitle='Reset Password';
?>

    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'user-form',
      'enableAjaxValidation' => true,
      'enableClientValidation' => true,
      'clientOptions' => array(
        'validateOnSubmit' => false,
        ),
      'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
      )); ?>

      <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-success alert-bold-border fade in alert-dismissable')); ?>

      <div class="form-group has-feedback lg left-feedback no-label">
       <?php echo $form->labelEx($model,'password'); ?>
       <?php echo $form->passwordField($model,'password', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Password Baru')); ?>
       <?php echo $form->error($model,'password'); ?>
     </div>

     <div class="form-group has-feedback lg left-feedback no-label">
      <?php echo $form->labelEx($model,'repeat_password'); ?>
      <?php echo $form->passwordField($model,'repeat_password', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Repeat Password Baru')); ?>
      <?php echo $form->error($model,'repeat_password'); ?>
    </div>

    <div class="form-group">
     <?php echo CHtml::submitButton('Reset Password', array('class' => 'btn btn-success btn-lg btn-perspective btn-block')); ?>
   </div>

   <?php $this->endWidget(); ?>

