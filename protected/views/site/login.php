<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
  );
  ?>

 <body class="login_page">
<div class="login_page_wrapper">
<div class="md-card" id="login_card">
<div class="md-card-content large-padding" id="login_form">
<div class="login_heading">
<div class="user_avatar"></div>
</div>
<form action="http://altair.tzdthemes.com/dashboard.html">
<div class="uk-form-row">
<label for="login_username">Username</label>
<input class="md-input" type="text" id="login_username" name="login_username"/>
</div>
<div class="uk-form-row">
<label for="login_username">Password</label>
<input class="md-input" type="password" id="login_username" name="login_username"/>
</div>
<div class="uk-margin-medium-top">
<button class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
</div>
<div class="uk-margin-top">
<span class="icheck-inline">
<input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
<label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
</span>
</div>
</form>
</div>
<div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
<button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top" id="login_help_close"></button>
<h2 class="heading_b uk-text-success">Can't log in?</h2>
<p>Here’s the info to get you back in to your account as quickly as possible.</p>
<p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
<p>If your password still isn’t working, it’s time to <a href="login.html#" id="login_password_reset_show">reset your password</a>.</p>
</div>
<div class="md-card-content large-padding" id="login_password_reset" style="display: none">
<h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
<form action="login.html">
<div class="uk-form-row">
<label for="login_email_reset">Your email address</label>
<input class="md-input" type="text" id="login_email_reset" name="login_email_reset"/>
</div>
<div class="uk-margin-medium-top">
<button class="md-btn md-btn-primary md-btn-block">Reset password</button>
</div>
</form>
</div>
</div>
<div class="uk-margin-top">
<a href="login.html#" id="login_help_show">Need help?</a>
</div>
</div>
 
