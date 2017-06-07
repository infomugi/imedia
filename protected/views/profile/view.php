<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
  'Users'=>array('index'),
  $model->username,
  );

$this->pageTitle='Profile - '.$model->first_name ." ".$model->last_name;
?>

<!--wrapper start-->
<div class="wrapper" id="wrapper">
  <header>
    <!--banner start-->
    <div class="banner row" id="banner">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd" style="height:100%">
        <!--background slide show start-->
        <ul class="cb-slideshow">
          <li><span>Image 01</span></li>
        </ul>
        <!--background slide show end-->
      </div>
    </div>
    <!--banner end-->
    <div class="bannerText container">
      <h1>I'm <?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?></h1>
      <h2><?php echo CHtml::encode($model->job); ?></h2>
    </div>
    <!--menu start-->
    <div class="menu">
      <div class="navbar-wrapper">
        <div class="container">
          <div class="navwrapper">
            <div class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  <a class="navbar-brand" href="#">Menu</a> </div>
                  <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="menuItem active"><a href="#wrapper">Home</a></li>
                      <li class="menuItem"><a href="#aboutme">About</a></li>
                      <li class="menuItem"><a href="#technical">Skills</a></li>
                      <li class="menuItem"><a href="#exprience">Experience</a></li>
                      <li class="menuItem"><a href="#education">Education</a></li>
                      <li class="menuItem"><a href="#protfolio">Portfolio</a></li>
                      <li class="menuItem"><a href="#contact">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Navbar -->
          </div>
        </div>
      </div>
      <!--menu end-->
    </header>
    <!--about me start-->
    <section class="aboutme" id="aboutme">
      <div class="container">
        <div class="heading">
          <h2>About me</h2>
          <p>A small introduction about my self</p>
        </div>
        <div class="row">
          <div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <h3 style="text-transform:capitalize"><?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?></h3>
            <h4 class="subHeading"><?php if($model->division==0){echo "Division not Found";}else{echo $model->Division->name;} ?> - <?php echo CHtml::encode($model->job); ?></h4>
            <p><?php echo CHtml::encode($model->bio); ?></p>

            <h4 class="subHeading">
              <div class="label label-primary"><i class="fa fa-eye"/></i> <?php echo CHtml::encode($model->views); ?></div> 
              <div class="label label-warning"><i class="fa fa-star"/></i> <?php echo Yii::app()->db->createCommand("SELECT SUM(point) FROM activities WHERE user_id=".$model->id_user."")->queryScalar();?></div>
            </h4>

            </div>
            <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1 proPic"> <img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->image; ?>" alt="" class="img-circle topmar"> </div>
          </div>
        </div>
      </section>
      <!--about me end-->
      <!--technical start-->
      <section class="technical" id="technical">
        <div class="container">
          <div class="heading">
            <h2>Technical Skills</h2>
            <p>I can say i’m quite good at</p>
          </div>
          <div class="row">

            <?php 
            $this->widget('zii.widgets.CListView', array(
              'dataProvider'=>$dataSkill,
              'itemView'=>'_view_skill',
              'summaryText'=>''
              )); 
              ?>

            </div>
          </div>
        </section>
        <!--technical end-->
        <!--exprience start-->
        <section class="exprience" id="exprience">
          <div class="container">
            <div class="heading">
              <h2>Work Experience</h2>
              <p>My previous associations</p>
            </div>

            <?php foreach (Experience::getExperience($model->id_user) as $data) { ?>   
           
          <div class="row workDetails">
          <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear"><?php echo $data["dates"]; ?></div>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
          <h4><?php echo $data["job"]; ?></h4>
          <h5><?php echo $data["type"]; ?></h5>
          <p><?php echo $data["description"]; ?></p>
          </div>
          </div>
          </div>

            <?php } ?>  
            
                </div>
              </section>
              <!--exprience end-->
              <!--education start-->
              <section class="education" id="education">
                <div class="container">
                  <div class="heading">
                    <h2>Education & Diplomas</h2>
                    <p>What I have done in my academic career</p>
                  </div>
            <?php foreach (Experience::getEducation($model->id_user) as $data) { ?>   
           
          <div class="row workDetails">
          <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear"><?php echo $data["dates"]; ?></div>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
          <h4><?php echo $data["school"]; ?></h4>
          <h5><?php echo $data["type"]; ?></h5>
          <p><?php echo $data["description"]; ?></p>
          </div>
          </div>
          </div>

            <?php } ?>  

                </div>
              </section>
              <!--education end-->
              <!--protfolio start-->
              <section class="protfolio" id="protfolio">
                <div class="container">
                  <div class="heading">
                    <h2>Portfolio</h2>
                    <p>showcase of my latest works</p>
                  </div>
                  <div class="portfolioFilter">
                    <ul>
                      <li><a href="#" data-filter="*" class="current">All</a></li>
                      <?php foreach (Category::getCategoryMy($model->id_user) as $data) { ?>   
                        <li><a href="#" data-filter=".<?php echo $data["id_category"]; ?>"><?php echo $data["name"]; ?></a></li>
                        <?php } ?>  

                      </ul>
                    </div>
                    <ul class="portfolioContainer row">


                      <?php foreach (Post::getPortofolioMy($model->id_user) as $data) { ?>   
                        <li class="<?php echo $data["id_category"]; ?> col-xs-6 col-sm-4 col-md-3 col-lg-3">
                          <div class="lightCon"> 
                            <span class="hoverBox"> 
                              <span class="smallIcon"> 
                                <a rel="lightbox-demo" href="<?php echo Yii::app()->baseUrl; ?>/image/posting/big/<?php echo $data["image"]; ?>" title="<?php echo $data["title"]; ?>" class="zoom lb lb_warsaw1">
                                  <i class="fa fa-search fa-2x"></i>
                                </a> 
                                <a href="<?php echo Yii::app()->baseUrl; ?>/article/<?php echo $data["url"]; ?>" title="<?php echo $data["title"]; ?>" target="_blank" class="linKed">
                                  <i class="fa fa-link fa-2x"></i></i></a> 
                                </span> 
                              </span> 
                              <img src="<?php echo Yii::app()->baseUrl; ?>/image/posting/small/<?php echo $data["image"]; ?>" alt=""  > 
                            </div>
                          </li>
                          <?php } ?>  


                        </ul>
                      </div>
                    </section>
                    <!--protfolio end-->

                    <section class="contactDetails" id="contact">
                      <div class="container">
                        <!--contact info start-->
                        <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                          <h4>Contact details</h4>
                          <p> <i class="fa fa-map-marker fa-lg"></i> <?php echo CHtml::encode($model->location); ?></p>
                          <p> <i class="fa fa-mobile fa-lg"></i> <?php echo CHtml::encode($model->phone); ?></p>
                          <p> <i class="fa fa-barcode fa-lg"></i> PIN : <?php echo CHtml::encode($model->pin); ?></p>
                          <p> <i class="fa fa-envelope-o "></i> <a href="mailto:<?php echo CHtml::encode($model->email); ?>"><?php echo CHtml::encode($model->email); ?></a></p>
                          <p> <i class="fa fa-link "></i> <a href="<?php echo CHtml::encode($model->website); ?>"><?php echo CHtml::encode($model->website); ?></a></p>
                        </div>
                        <!--contact info end-->
                        <!--contact form start-->
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 conForm">
                          <h4>Send a Message to <?php echo CHtml::encode($model->first_name); ?></h4>
                          <div id="message"></div>
                          <?php echo $this->renderPartial('_form_contact', array('message'=>$message)); ?>
                          <div id="simple-msg"></div>
                        </div>
                        <!--contact form end-->
                      </div>
                    </section>
                    <!--contact end-->
                    <!--footer start-->
                    <section class="footer" id="footer">
                      <div class="container">
                        <ul>
                          <li><a href="http://facebook.com/<?php echo CHtml::encode($model->facebook); ?>"><i class="fa fa-twitter fa-2x"></i></a></li>
                          <li><a href="http://twitter.com/<?php echo CHtml::encode($model->twitter); ?>"><i class="fa fa-facebook fa-2x"></i></a></li>
                          <li><a href="http://plus.google.com/<?php echo CHtml::encode($model->gplus); ?>"><i class="fa fa-google-plus fa-2x"></i></a></li>
                        </ul>
                      </div>
                    </section>
                    <!--footer end-->
                  </div>