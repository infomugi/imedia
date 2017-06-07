<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
	'Forgot Password',
  );
  ?>

  <?php
  foreach(Yii::app()->user->getFlashes() as $key =>$message)
  {
    echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
  }
  ?>

  <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'forgot-form',
      'enableAjaxValidation' => true,
      'enableClientValidation' => true,
      'clientOptions' => array(
        'validateOnSubmit' => true,
        ),
      'errorMessageCssClass' => 'label label-danger',
      'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
      )); ?>

      <?php echo $form->errorSummary($forgot, null, null, array('class' => 'alert alert-danger alert-bold-border fade in alert-dismissable')); ?>

  <div class="form-head mb20">
    <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold"><?php echo YII::app()->name; ?></h1>
    <h5 class="text-normal h5 text-center">Forgot Password</h5>
  </div>

    <div class="form-container">
      <form class="form-horizontal" action="javascript:;">
        <p class="small text-center mb20">Enter your email address you've registered with you. We'll send you reset link to that address.</p>

        <div class="md-input-container md-float-label">

          <?php echo $form->textField($forgot,'email', array('class' => 'md-input')); ?>
          <?php echo $form->labelEx($forgot,'email'); ?>

        </div>

       <?php echo CHtml::submitButton('Reset Password', array('class' => 'btn btn-primary btn-block text-uppercase btn-lg')); ?>
      </form>
    </div>

 <?php $this->endWidget(); ?>







