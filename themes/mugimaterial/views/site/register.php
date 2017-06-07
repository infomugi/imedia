<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->widget('ext.yii-toastr.MugiToastr', array(
  'flashMessagesOnly' => true, 
  'options' => array(
    "closeButton" => true,
    "debug" => true,
    "progressBar"=> true,
    "positionClass" => "toast-top-center",
    "showDuration" => "600",
    "hideDuration" => "1000",
    "timeOut" => "15000",
    "extendedTimeOut" => "1000",
    "showEasing" => "swing",
    "hideEasing" => "linear",
    "showMethod" => "fadeIn",
    "hideMethod" => "fadeOut"
    )
  ));

$this->pageTitle=Yii::app()->name . ' - Register new Account';
$this->breadcrumbs=array(
	'Register new Account',
  );
  ?>

  <div class="form-head mb20">
    <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold"><?php echo YII::app()->name; ?></h1>
    <h5 class="text-normal h5 text-center">Register</h5>
  </div>

  <div class="form-container">

    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'login-form',
      'enableAjaxValidation' => true,
      'enableClientValidation' => true,
      'clientOptions' => array(
        'validateOnSubmit' => true,
        ),
      'errorMessageCssClass' => 'label label-info',
      'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form','autocomplete'=>false)
      )); ?>

      <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-info alert-bold-border fade in alert-dismissable')); ?>

    <!--       
    <div class="md-input-container md-float-label">
       <?php echo $form->textField($model,'first_name', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'first_name'); ?>
       <?php echo $form->error($model,'first_name'); ?>
     </div>

     <div class="md-input-container md-float-label">
       <?php echo $form->textField($model,'last_name', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'last_name'); ?>
       <?php echo $form->error($model,'last_name'); ?>
     </div> 
     -->

     <div class="md-input-container md-float-label">
       <?php echo $form->textField($model,'email', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'email'); ?>
       <?php echo $form->error($model,'email'); ?>
     </div>

     <div class="md-input-container md-float-label">
       <?php echo $form->textField($model,'username', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'username'); ?>
       <?php echo $form->error($model,'username'); ?>
     </div>               

     <div class="md-input-container md-float-label">
       <?php echo $form->passwordField($model,'password', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'password'); ?>
       <?php echo $form->error($model,'password'); ?>
     </div>     

     <div class="md-input-container md-float-label">
       <?php echo $form->passwordField($model,'repeat_password', array('class' => 'md-input')); ?>
       <?php echo $form->labelEx($model,'repeat_password'); ?>
       <?php echo $form->error($model,'repeat_password'); ?>
     </div>          

     <div class="btn-group btn-group-justified mb15">
      <div class="btn-group">
       <?php echo CHtml::link('Sign In',array('login'),array('class' => 'btn btn-success','title'=>'Login'));?>
     </div>
      <div class="btn-group">
       <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-info')); ?>
     </div>
   </div> 

  <?php $this->endWidget(); ?>

</div>




