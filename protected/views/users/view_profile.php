<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
  'Users'=>array('index'),
  $model->username,
  );

$this->pageTitle='Profile - '.$model->first_name ." - ".$model->last_name;
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
          <li><span>Image 02</span></li>
          <li><span>Image 03</span></li>
        </ul>
        <!--background slide show end-->
      </div>
    </div>
    <!--banner end-->
    <div class="bannerText container">
      <h1>I'm <?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?></h1>
      <h2><?php if($model->division==0){echo "Division not Found";}else{echo $model->Division->name;} ?></h2>
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
          <h3><?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?></h3>
          <h4 class="subHeading"><?php if($model->division==0){echo "Division not Found";}else{echo $model->Division->name;} ?></h4>
          <p><?php echo CHtml::encode($model->bio); ?></p>
          <a href="#" class="bntDownload">Download Printable Resume</a> </div>
        <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1 proPic"> <img src="images/me.jpg" alt="" class="img-circle topmar"> </div>
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
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="90"> <span class="percent"></span> </span>
            <h4>Photoshop</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="80"> <span class="percent"></span> </span>
            <h4>Illustrator</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="80"> <span class="percent"></span> </span>
            <h4>Flash</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="75"> <span class="percent"></span> </span>
            <h4>HTML5 / CSS3</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="60"> <span class="percent"></span> </span>
            <h4>jQuery</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="65"> <span class="percent"></span> </span>
            <h4>PHP / MySQL</h4>
            <p>Donec accumsan ligula vitae mag na curabitur id</p>
          </div>
        </div>
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
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Mar,2011<br>
            Present</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>UIzards</h4>
            <h5>Senior UX Designer</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Mar,2011<br>
            Present</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>Lexind</h4>
            <h5>Visual / UI Designer</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Mar,2011<br>
            Present</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>Matrix Media</h4>
            <h5>Visual / UI Designer</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
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
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Mar,2010</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>Master Degree of Design</h4>
            <h5>University of Design</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Sept, 2007</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>Bachelor of Arts</h4>
            <h5>University of Design</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Feb, 2005</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>Master Degree of Design</h4>
            <h5>University of Design</h5>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quom placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui faorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
          </div>
        </div>
      </div>
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
          <li><a href="#" data-filter=".photos">Photos</a></li>
          <li><a href="#" data-filter=".branding">Branding</a></li>
          <li><a href="#" data-filter=".illustration">Illustration</a></li>
        </ul>
      </div>
      <ul class="portfolioContainer row">
        <li class="photos col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-1.jpg" title="Project Title1" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-1.jpg" alt=""  > </div>
        </li>
        <li class="branding illustration col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-2.jpg" title="Project Title2" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-2.jpg" alt="" > </div>
        </li>
        <li class="illustration col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-3.jpg" title="Project Title3" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-3.jpg" alt="" > </div>
        </li>
        <li class="branding illustration col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-4.jpg" title="Project Title4" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-4.jpg" alt="" > </div>
        </li>
        <li class="illustration photos col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-5.jpg" title="Project Title5" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-5.jpg" alt="" > </div>
        </li>
        <li class="branding photos col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-6.jpg" title="Project Title6" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-6.jpg" alt="" > </div>
        </li>
        <li class="illustration photos col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-7.jpg" title="Project Title7" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-7.jpg" alt="" > </div>
        </li>
        <li class="branding col-xs-6 col-sm-4 col-md-3 col-lg-3">
          <div class="lightCon"> <span class="hoverBox"> <span class="smallIcon"> <a rel="lightbox-demo" href="images/big-8.jpg" title="Project Title8" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a> <a href="#" title="Project Link" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></i></a> </span> </span> <img src="images/thu-8.jpg" alt="" > </div>
        </li>
      </ul>
    </div>
  </section>
  <!--protfolio end-->
  <!--contact start-->
  <section class="contact" id="contact">
    <div class="container topCon">
      <div class="heading">
        <h2>Get In Touch</h2>
        <p>Please feel free if you would like to have a chat.</p>
      </div>
    </div>
    <div class="row mapArea">
      <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=-37.817682,144.957595&amp;spn=0.01134,0.026157&amp;t=m&amp;z=16&amp;output=embed"></iframe>
    </div>
  </section>
  <section class="contactDetails">
    <div class="container">
      <!--contact info start-->
      <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
        <h4>Contact details</h4>
        <p> <i class="fa fa-map-marker fa-lg"></i> Collins Street West Victoria 8007 Australia</p>
        <p> <i class="fa fa-mobile fa-lg"></i> +1800 1234 56789</p>
        <p> <i class="fa fa-envelope-o "></i> <a href="mailto:support@websitename.com">support@websitename.com</a></p>
        <p> <i class="fa fa-link "></i> <a href="http://themeelite.com/demos/flato/template-2/www.websitename.com">www.websitename.com</a></p>
      </div>
      <!--contact info end-->
      <!--contact form start-->
      <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8 conForm">
        <h4>Shoot a message!</h4>
        <div id="message"></div>
        <form method="post" action="http://themeelite.com/demos/flato/template-2/php/contact.php" name="cform" id="cform">
          <input name="name" id="name" type="text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6" placeholder="Your name..." >
          <input name="email" id="email" type="email" class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 noMarr" placeholder="Your email..." >
          <textarea name="comments" id="comments" cols="" rows="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your message..."></textarea>
          <input type="submit" id="submit" name="send" class="submitBnt" value="Send message">
          <div id="simple-msg"></div>
        </form>
      </div>
      <!--contact form end-->
    </div>
  </section>
  <!--contact end-->
  <!--footer start-->
  <section class="footer" id="footer">
    <div class="container">
      <ul>
        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>
        <li><a href="#"><i class="fa fa-rss fa-2x"></i></a></li>
      </ul>
    </div>
  </section>
  <!--footer end-->
</div>