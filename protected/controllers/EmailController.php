<?php

class EmailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('send'),
				'users'=>array('@'),
				),
			);
	}

	public function actionSend($data){
		$this->layout="dashboard";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$message = new YiiMailMessage;
		$template = $data;
		$content = "Hello Its Me";

		//Header
		$message->subject = "Informasi - ".$template;
		
		//Send One
		// $message->addTo('infomugi@gmail.com');
		
		//Send Many
		$message->setTo(array('infomugi@gmail.com', 'infotravelboi@gmail.com'));

		//Content
		$message->setFrom(array('infomugi.com@gmail.com' => 'Mugi dari Infomugi.com'));
		$message_template = $this->renderPartial('/email/'.$template.'',array('message'=>$content),TRUE);
		$message->setBody($message_template, 'text/html');	
		
		if(!Yii::app()->mail->send($message)){
			echo "Mailer Error: " . $message->ErrorInfo;
		} else {
			Yii::app()->user->setFlash('Success', '<i>Email Terkirim</i>');
			$this->render($template);
		} 		
	}	


}
