<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Template Didesain oleh Mugi Rachmat - www.infomugi.com">
  <meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/favicon.ico">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/animate.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/owl.theme.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/prettyPhoto.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/smoothness/jquery-ui-1.10.4.custom.min.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/rs-plugin/css/settings.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/theme.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/colors/turquoise.css" id="switch_style">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/intro/css/responsive.css">

  <body>

    <!-- Top header -->
    <div id="top-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-6">
            <div class="th-text pull-left">
              <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 022 70568457</a> </div>
              <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> KONTAK@ANUGRAHTRAVEL.COM </a></div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="th-text pull-right">
              <div class="th-item">
                <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="index.html#"><i class="fa fa-twitter"></i></a> <a href="index.html#"><i class="fa fa-youtube-play"></i></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header -->
    <header>
      <!-- Navigation -->
      <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="index.html" class="navbar-brand">         
              <!-- Logo -->
              <div id="logo"> <img id="default-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/images/logo.png" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/images/logo-retina.png" alt="Starhotel" style="height:44px;"> </div>
            </a> </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                <?php
                $this->widget('zii.widgets.CMenu', array(
                  'htmlOptions' => array('class' => 'nav navbar-nav'),
                  'encodeLabel'=>FALSE,
                  'items' => array(
                    array('label' => '<i class="fa fa-home"></i> Home', 'url' => array('/site/index')),
                    array('label' => '<i class="fa fa-archive"></i> Wisata', 'url' => array('/wisata/index')),
                    array('label' => '<i class="fa fa-tasks"></i> Paket Wisata', 'url' => array('/paketwisata/index')),
                    array('label' => '<i class="fa fa-user"></i> Pendaftaran', 'url' => array('/user/register'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => '<i class="fa fa-lock"></i> Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => '<i class="fa fa-user"></i> My Profile', 'url' => array('user/view&id='.YII::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => '<i class="fa fa-power-off"></i> Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    )
                  ));
                  ?>


                </ul>
              </div>
            </div>
          </div>
        </header>

              <?php echo $content; ?>


      <!-- Footer -->
      <footer>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
              <div class="col-xs-6"> &copy; 2015 Anugrah Tour Travel </div>
              <div class="col-xs-6 text-right">
                Menikmati Destinasi Wisata Terbaik
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- Go-top Button -->
      <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>


      <!-- Javascripts --> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery-1.11.0.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/bootstrap-hover-dropdown.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/owl.carousel.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.parallax-1.1.3.js"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.nicescroll.js"></script>  
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.prettyPhoto.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery-ui-1.10.4.custom.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.forms.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.sticky.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/waypoints.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.isotope.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/jquery.gmap.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/http://maps.google.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/switch.js"></script> 
      <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/intro/js/custom.js"></script> 

    </body>
    </html>


