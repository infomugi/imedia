<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle='Error ' . $code;
$this->breadcrumbs=array(
    'Error',
    );
    ?>
    <div class="wrapper-page">
        <div class="ex-page-content text-center">

            <h1><?php echo $code; ?>!</h1>
            <h2>Error <?php echo $code; ?> : <?php echo CHtml::encode($message); ?></h2>
            <br>
            <?php if(!YII::app()->user->isGuest): ?>
            <p>You better try our awesome search:</p>

            <div class="row">
                <div class="input-group">
                    <span class="input-group-btn">
                       <?php 
                       echo CHtml::beginForm(CHtml::normalizeUrl(array('post/index')), 'get', array('id'=>'filter-form'))
                       . CHtml::textField('find', (isset($_GET['find'])) ? $_GET['find'] : '', array('id'=>'find','class'=>'form-control input-lg','placeholder'=>'Search...'))
                       . CHtml::endForm();
                       ?>
                   </span>
               </div>
           </div>
           <br>

           <?php echo CHtml::link('<i class="fa fa-home"></i> Back to Home',
            array('dashboard'),
            array('class' => 'btn btn-primary waves-effect waves-light btn-lg'));
            ?>

            <?php endif; ?>
        </div>
    </div>