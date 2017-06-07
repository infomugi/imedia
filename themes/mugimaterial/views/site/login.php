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

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
  );
  ?>

  <div class="form-head mb20">
    <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold"><?php echo YII::app()->name; ?></h1>
    <h5 class="text-normal h5 text-center">Sign In to Dashboard</h5>
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
      'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
      )); ?>

      <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger alert-bold-border fade in alert-dismissable')); ?>

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


     <div class="clearfix mb15">
       <?php echo CHtml::link('Forget your password ?',array('forgot'),array('class' => 'text-info small','title'=>'Forget your password ?'));?>
     </div>

     <div class="btn-group btn-group-justified mb15">
      <div class="btn-group">
       <?php echo CHtml::submitButton('Sign In', array('class' => 'btn btn-info')); ?>
     </div>
   </div> 

   <div class="clearfix text-center small">
    <p>
    Don't have an account? <?php echo CHtml::link('Create Now',array('register'),array('class' => 'text-center','title'=>'Create Now'));?>
   </p>
 </div>

 <?php $this->endWidget(); ?>

</div>


