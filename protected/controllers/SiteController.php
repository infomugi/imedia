<?php

class SiteController extends Controller
{
	public $debugMode = true;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				),
			);
	}

	/**
	 * Displays the : Frontend Site
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest) {
			$this->layout="frontend";
			$this->render('frontend');
		} else {
			$this->layout="frontend";
			$this->render('frontend');
		}
	}

	/**
	 * Displays the : Backend Site
	 */
	public function actionDashboard()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			
			$this->layout="dashboard";

			$dataUnread=new CActiveDataProvider('Message',array(
				'criteria'=>array(
					'condition'=>'user_id = '.YII::app()->user->id.' AND status=0',
					'order'=>'created_date DESC'
					)
				));	

			$dataActivity=new CActiveDataProvider('Activities',array(
				'criteria'=>array(
					'condition'=>'user_id = '.YII::app()->user->id,
					'order'=>'id_activities DESC'
					),
				'pagination'=>array(
					'pageSize'=>'20',
					)));				

			$this->render('index',array(
				'dataUnread'=>$dataUnread,
				'dataActivity'=>$dataActivity
				));

		}
	}

	/**
	 * Displays the : List Icon
	 */
	public function actionIcon()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			if(Yii::app()->user->record->level==1){
				$this->render('icon');
			}else{
				throw new CHttpException(403,'You not authorized to this perfom.');
			}
		}
	}

	/**
	 * Displays the : Calendar
	 */
	public function actionCalendar()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			if(Yii::app()->user->record->level==1){
				$this->render('calendar');
			}else{
				throw new CHttpException(403,'You not authorized to this perfom.');
			}
		}
	}		


	/**
	 * Displays the : Stats
	 */
	public function actionStats()
	{
		if(Yii::app()->user->isGuest) {
			$this->actionLogin();
		} else {
			if(Yii::app()->user->record->level==1){
				$this->render('report');
			}else{
				throw new CHttpException(403,'You not authorized to this perfom.');
			}
		}
	}

	/**
	 * Displays the : Contact US
	 */
	public function actionContact()
	{
		$this->layout="frontend_contact";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;
		$message=new Message;
		if(isset($_POST['Message']))
		{
			$message->attributes=$_POST['Message'];
			$message->created_date = date('Y-m-d H:i:s');
			$message->status = 0;
			$message->user_id = 1;

			//Send Email
			$email->subject = "Ada Email dari ".$message->name." : ".$message->email;
			$email->addTo('infomugi@gmail.com');
			$email->setFrom(array('infomugi.com@gmail.com' => 'Pesan dari Infomugi.com'));
			$message_template = $this->renderPartial('/email/notifikasi',
				array(
					'name'=>$message->name,
					'email'=>$message->email,
					'message'=>$message->message
					),TRUE);
			$email->setBody($message_template, 'text/html');	
			
			if($message->save() && Yii::app()->mail->send($email))
				$this->refresh();
			Yii::app()->user->setFlash('success', '<b>Sukses!</b> <i>Pesan Terkirim</i>');
		}	
		
		$this->render('contact',array(
			'message'=>$message
			));
	}	

	/**
	 * Displays the : Forgot Password with active email and send verification to mail
	 */
	public function actionForgot()
	{
		$this->layout = "signin";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;
		$forgot=new ForgotPassword;

		if(isset($_POST['ForgotPassword']))
		{
			$forgot->attributes=$_POST['ForgotPassword'];

			//Find User
			$finduser=$this->loadEmail($forgot->email);
			$user_firstname = $finduser->first_name;
			$user_username = $finduser->username;
			$user_email = $finduser->email;

            $getToken=rand(0, 99999);
            $getTime=date("H:i:s");
            $finduser->token=md5($getToken.$getTime);
     
			//Message Content
			$message_title = "Permintaan Reset Password";
			$message_content = 
			"Hallo <b>".$finduser->first_name."</b>, </br></br>
			Ini Link untuk reset passwordnya, silahkan di klik </br>
			";
			$message_link = "http://localhost".Yii::app()->baseUrl."/reset/".$finduser->token;
			$message_button = "Reset Password"; 			

			//Send Email
			$email->subject = "Hi ".$user_firstname.", Buat kembali password Anda";
			$email->addTo('infomugi@gmail.com');
			$email->setFrom(array('infomugi.com@gmail.com' => 'Infomugi.com'));
			$message_template = $this->renderPartial('/email/forgotpassword',
				array(
					'email'=>$finduser->email,
					'title'=>$message_title,
					'message'=>$message_content,
					'link'=>$message_link,
					'button'=>$message_button
					),TRUE);
			$email->setBody($message_template, 'text/html');	

			//Notifikasi Forgot Password
			//$userid,$description,$activityid,$type,$point,$status
			$ip = Yii::app()->request->getUserHostAddress();
			Activities::model()->my($finduser->id_user,"Someone has request password reset - IP : ".$ip,$finduser->id_user,18,1,8);

			if($finduser->save() && Yii::app()->mail->send($email))
			Yii::app()->user->setFlash('info','Instruksi untuk reset password telah dikirimkan ke email Anda');
			$this->refresh();	

		}
		
		$this->render('forgot',array(
			'forgot'=>$forgot
			));
	}	
	
	/**
	 * Displays the : Reset Password
	 */	
	public function actionReset($token)
	{
		$this->layout = "signin";
		$model=$this->getToken($token);
		$model->setScenario('resetPassword');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				if($model->save())
					//Update Token apabila Password di Perbaharui
					$updatetoken=Users::model()->findByAttributes(array('email'=>$model->email));
					$getToken=rand(0, 99999);
           			$getTime=date("H:i:s");
          	 		$updatetoken->token=md5($getToken.$getTime);
          	 		$updatetoken->save();

					//Notifikasi Reset Password
					//$userid,$description,$activityid,$type,$point,$status
					$ip = Yii::app()->request->getUserHostAddress();
					Activities::model()->my($model->id_user,"Someone has reset password - IP : ".$ip,$model->id_user,19,1,9);
					$this->redirect(array('login'));
			}

			$this->render('password',array(
				'model'=>$model,
			));
	}		

	public function actionRegister()
	{
		$this->layout = "signin";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;		
		$model=new Users;
		$model->setScenario('register');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->create_date = date('Y-m-d H:i:s');
			$model->level = 2;
			$model->image = "admin.png";
			$model->cover = "admin.png";
			$model->background = "#FFF";	
			$model->ipaddress = Yii::app()->request->getUserHostAddress();		
			// $model->password = md5($model->password);
			// $model->repeat_password = md5($model->repeat_password);

			//Create Token
            $getToken=rand(0, 99999);
            $getTime=date("H:i:s");
            $model->token=md5($getToken.$getTime);			

			//Message Content
			$message_title = "Konfirmasi Akun";
			$message_content = 
			"Hallo <b>".$model->first_name."</b>, </br></br>
			Ini Link untuk aktivasi akun anda, silahkan di klik </br>";
			$message_link = "http://localhost".Yii::app()->baseUrl."/activation/".$model->token;
			$message_button = "Aktivasi Sekarang";

			//Send Email
			$email->subject = "Hi ".$model->first_name.", Segera aktivasi akun Anda";
			$email->addTo('infomugi@gmail.com');
			$email->setFrom(array('infomugi.com@gmail.com' => 'Infomugi.com'));
			$message_template = $this->renderPartial('/email/forgotpassword',
				array(
					'email'=>$model->email,
					'title'=>$message_title,
					'message'=>$message_content,
					'link'=>$message_link,
					'button'=>$message_button
					),TRUE);
			$email->setBody($message_template, 'text/html');	

			//Notifikasi Registrasi Pengguna Baru
			//$userid,$description,$activityid,$type,$point,$status
			Activities::model()->my($model->id_user,"Register new account ".$model->username,$model->id_user,5,50,6);
			
			if($model->save() && Yii::app()->mail->send($email))
			Yii::app()->user->setFlash('info','Instruksi untuk aktivasi akun telah dikirimkan ke email Anda');
			$this->refresh();				

		}

		$this->render('register',array(
			'model'=>$model,
			));
	}		

	public function actionActivation($token)
	{
		$this->layout = "signin";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;			
		$model=$this->getToken($token);

		//Message Content
		$message_title = "Informasi Akun Anda";
		$message_content = 
		"Hallo <b>".$model->first_name."</b>, </br></br>
		Ini Link untuk masuk ke akun anda, silahkan di klik </br></br>
		Username : <b>".$model->username."</b> </br>
		Password : <b>".$model->password."</b> </br>
		Email : <b>".$model->email."</b> </br>
		";
		$message_link = "http://localhost".Yii::app()->baseUrl."/login/";
		$message_button = "Masuk Sekarang"; 	

		//Update Token apabila Email Valid
		$updatetoken=Users::model()->findByAttributes(array('email'=>$model->email));
		$getToken=rand(0, 99999);
		$getTime=date("H:i:s");
 		$updatetoken->token=md5($getToken.$getTime);
 		$updatetoken->active = 1;
 		$updatetoken->password = md5($model->password);
 		$updatetoken->save();			

		//Send Email
		$email->subject = "Hi ".$model->first_name.", Selamat akun anda berhasil di Aktivasi";
		$email->addTo('infomugi@gmail.com');
		$email->setFrom(array('infomugi.com@gmail.com' => 'Infomugi.com'));
		$message_template = $this->renderPartial('/email/forgotpassword',
			array(
				'email'=>$model->email,
				'title'=>$message_title,
				'message'=>$message_content,
				'link'=>$message_link,
				'button'=>$message_button
				),TRUE);
		$email->setBody($message_template, 'text/html');
		Yii::app()->mail->send($email);	 				

		//Notifikasi Reset Password
		//$userid,$description,$activityid,$type,$point,$status
		$ip = Yii::app()->request->getUserHostAddress();
		Activities::model()->my($model->id_user,"Someone has activated account - IP : ".$ip,$model->id_user,9,1,9);
		Yii::app()->user->setFlash('success','Selamat! Akun anda berhasil di verifikasi, silahkan masuk.');
		$this->redirect(array('login'));
	}		

	public function getToken($token)
	{
		$model=Users::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'Token anda tidak valid atau telah kadaluarsa.');
		return $model;
	}			

	public function loadEmail($email)
	{
		$model=Users::model()->findByAttributes(array('email'=>$email));
		if($model===null)
			throw new CHttpException(404,'Email yang anda masukan tidak terdaftar dalam sistem kami.');
		return $model;
	}		

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(Yii::app()->user->isGuest) {
			$model=new LoginForm;

			$this->layout = "signin";

			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login()){
					$id = Yii::app()->user->id;
					$name = Yii::app()->user->name;
					$ip = Yii::app()->request->getUserHostAddress();

					//$userid,$description,$activityid,$type,$point,$status
					Activities::model()->my($id,"Login from IP : ".$ip,1,1,2,1);

					if(YII::app()->user->record->level==1){
					// $this->redirect(Yii::app()->user->returnUrl);
						Yii::app()->user->setFlash('Info', 'Last login <span class="format-date">'.YII::app()->user->record->last_visit.'</span> From IP : '.YII::app()->user->record->ipaddress.'');
						$this->redirect(array('site/dashboard'));
					}else{
						$this->redirect(array('users/profile','view'=>$name));
					}
				}
			}
			// display the login form
			$this->render('login',array('model'=>$model));

		} else {
			$this->redirect(array('site/dashboard'));
		}
	}	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout($id)
	{
		$model=Users::model()->findByPk($id);
		$model->setScenario('log');
		$model->active = 0;
		$ip = Yii::app()->request->getUserHostAddress();

		//$userid,$description,$activityid,$type,$point,$status
		Activities::model()->my($id,"Logout from IP : ".$ip,0,0,0,0);

		if($model->save()){
			Yii::app()->user->logout();
			$this->redirect(array('site/login'));
		}
	}


}