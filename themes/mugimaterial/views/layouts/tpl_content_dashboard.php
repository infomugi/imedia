
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

  <!-- Start content -->
  <div class="content">
    <div class="container">

      <!-- Page-Title -->
      <div class="row hidden-xs">
        <div class="col-sm-12">
          <h4 class="pull-left page-title"><?php echo CHtml::encode($this->pageTitle); ?></h4>
          <span class="hidden-xs">
            <ol class="breadcrumb pull-right">
              <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                  'links'=>$this->breadcrumbs,
                  'homeLink'=>CHtml::link('Dashboard'),
                  )); ?><!-- breadcrumbs -->
                <?php endif?>
              </ol>
            </span>
          </div>
        </div>

            <?php echo $content; ?>

      </div>
      <!-- container -->
    </div>

    <!-- content -->
    <footer class="footer text-right hidden-xs">2015 © <?php echo CHtml::encode(Yii::app()->name); ?>.</footer>

  </div>

  <!-- ============================================================== -->
  <!-- End Right content here -->
  <!-- ============================================================== -->
  <!-- Right Sidebar -->
  <div class="side-bar right-bar nicescroll">
    <h4 class="text-center">Online</h4>
    <div class="contact-list nicescroll">
      <ul class="list-group contacts-list">

      <?php
      foreach (Users::getActiveUsers() as $Users) {
        ?>
        <li class="list-group-item"><a href="<?php echo Yii::app()->baseUrl; ?>/profile/<?php echo $Users["username"]; ?>">
          <div class="avatar">
            <img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?php echo $Users["image"]; ?>" alt="Avatar <?php echo $Users["username"]; ?>">
          </div>
          <span class="name"><?php echo $Users["username"]; ?></span> 
          <i class="fa fa-circle online"></i></a> 
          <span class="clearfix"></span>
        </li>

        <?php
      }
      ?> 

      </ul>
    </div>

  </div>
</div>
<!-- /Right-bar -->

</div>
