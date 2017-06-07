
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
  <!-- Start content -->
  <div class="content">
  <div class="wraper">

      <!-- Start content -->
      <?php echo $content; ?>

    </div>
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
          <span class="name" data-toggle="tooltip" title="<?php echo $Users["username"]; ?>"><?php echo $Users["username"]; ?></span> 
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
