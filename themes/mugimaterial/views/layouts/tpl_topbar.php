  <!-- Top Bar Start -->
  <div class="topbar">

  <!-- LOGO -->
  <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=12 AND active=1" )->queryScalar();?>

      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">
            <div class="pull-left">
              <button class="button-menu-mobile open-left"><i class="fa fa-bars"></i></button> 
              <span class="clearfix"></span>
            </div>

            <span class="hidden-xs">
             <?php 
             echo CHtml::beginForm(CHtml::normalizeUrl(array('post/index')), 'get', array('id'=>'filter-form','class'=>'navbar-form pull-left'))
             . CHtml::textField('find', (isset($_GET['find'])) ? $_GET['find'] : '', array('id'=>'find','class'=>'form-control search-bar','placeholder'=>'Search...'))
             . CHtml::endForm();
             ?>
           </span>

           <ul class="nav navbar-nav navbar-right pull-right">
           <!-- START: Button Top Bar Right -->
            <?php echo Yii::app()->db->createCommand("SELECT content FROM setting WHERE id_setting=13 AND active=1" )->queryScalar();?>
            <li class="dropdown"><a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="user-img" class="img-circle"></a>
             
              <?php
              $this->widget('zii.widgets.CMenu', array(
                'htmlOptions' => array('class' => 'dropdown-menu'),
                'encodeLabel'=>FALSE,
                'items' => array(
                  array('label' => '<i class="fa fa-eye"></i> View Site', 'url' => array('/site'), 'visible' => !Yii::app()->user->isGuest),
                  array('label' => '<i class="fa fa-briefcase"></i> View CV', 'url' => array('/profile/user','name'=>YII::app()->user->record->username), 'visible' => !Yii::app()->user->isGuest),
                  array('label' => '<i class="fa fa-user"></i> Profile', 'url' => array('/users/profile','view'=>YII::app()->user->record->username), 'visible' => !Yii::app()->user->isGuest),
                  array('label' => '<i class="fa fa-cog"></i> Settings', 'url' => array('/users/update','view'=>YII::app()->user->name), 'visible' => !Yii::app()->user->isGuest),
                  array('label' => '<i class="fa fa-power-off"></i> Logout', 'url' => array('/site/logout','id'=>YII::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                  array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                  )
                ));
                ?>    

                
              </div>

              <!--/.nav-collapse -->
            </div>
          </div>
        </div>
            <!-- Top Bar End -->