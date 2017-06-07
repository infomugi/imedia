<?php

class ProfileController extends Controller
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
				'actions'=>array('profile'),
				'users'=>array('*'),
				),		
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	public function actionUser($name)
	{
		$this->layout="frontend_profile";
		$message=new Message;
		$model=$this->loadProfile($name);
		$names=Users::model()->findByAttributes(array('username'=>$name));
		$names->setScenario('look');
		$names->views += 1;
		$names->save();		

		$dataActivity=new CActiveDataProvider('Activities',array(
			'criteria'=>array(
				'condition'=>'user_id = '.$model->id_user,
				'order'=>'created_date DESC'
				)
			));		

		$dataSkill=new CActiveDataProvider('Skill', array(
			'criteria'=>array(
				'condition'=>'user_id = '.$model->id_user,
				'order'=>'skill ASC'
				)
			));

		$dataExperience=new CActiveDataProvider('Experience', array(
			'criteria'=>array(
				'condition'=>'id_user = '.$model->id_user,
				'order'=>'sort ASC'
				)
			));		

		if(isset($_POST['Message']))
		{
			$message->attributes=$_POST['Message'];
			$message->created_date = date('Y-m-d H:i:s');
			$message->status = 0;
			$message->user_id = $model->id_user;
			if($message->save())
			$this->refresh();
		}		

		$this->render('view',array(
			'model'=>$this->loadProfile($name),
			'dataActivity'=>$dataActivity,
			'dataSkill'=>$dataSkill,
			'dataExperience'=>$dataExperience,
			'message'=>$message
			));

	}		

	public function loadProfile($name)
	{
		$model=Users::model()->findByAttributes(array('username'=>$name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
