<?php 
class Email extends CActiveRecord{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function Contact($name, $email, $message){

		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;

		//Email Content
		$email->subject = "Ada Email dari ".$name." : ".$email;
		$email->addTo('infomugi@gmail.com');
		$email->setFrom(array('infomugi.com@gmail.com' => 'Pesan dari Infomugi.com'));
		$message_template = $this->renderPartial('/email/notifikasi',
			array(
				'name'=>$name,
				'email'=>$email,
				'message'=>$message
			),TRUE);
		$email->setBody($message_template, 'text/html');	

		//Email Send
		Yii::app()->mail->send($email);

	}

	// public function Notification($name, $email, $title, $content, $link, $button){
			
	// 	Yii::import('ext.yii-mail.YiiMailMessage');
	// 	$email = new YiiMailMessage;

	// 	//Message Content
	// 	$message_title = "Permintaan Reset Password";
	// 	$message_content = 
	// 	"Hallo <b>".$finduser->first_name."</b>, </br></br>
	// 	Ini Link untuk reset passwordnya, silahkan di klik </br>
	// 	";
	// 	$message_link = "http://localhost".Yii::app()->baseUrl."/reset/".$finduser->token;
	// 	$message_button = "Reset Password"; 

	// 	//Email Content
	// 	$email->subject = "Hi ".$name.", Buat kembali password Anda";
	// 	$email->addTo('infomugi@gmail.com');
	// 	$email->setFrom(array('infomugi.com@gmail.com' => 'Infomugi.com'));
	// 	$message_template = $this->renderPartial('/email/forgotpassword',
	// 		array(
	// 			'email'=>$email,
	// 			'title'=>$title,
	// 			'message'=>$content,
	// 			'link'=>$link,
	// 			'button'=>$button
	// 			),TRUE);
	// 	$email->setBody($message_template, 'text/html');	

	// 	//Email Send
	// 	Yii::app()->mail->send($email);

	// }	

}
