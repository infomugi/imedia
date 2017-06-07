<?php

class MessageController extends Controller
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
				'actions'=>array('send','update','view','delete','admin','index','my','sendto','detail','clearall'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index','my','sendto','detail'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),	
			array('allow',
				'actions'=>array('send'),
				'users'=>array('*'),
				),							
			array('deny',
				'users'=>array('*'),
				),
			);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$Message=Message::model()->findByPk($id);
		$Message->read = 1;
		$Message->status = 1;
		$Message->save();	

		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
				), false, true);
		}
		else
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				));
		}
	}

	public function actionDetail($id)
	{
		$this->render('detail',array(
			'model'=>$this->loadModel($id),
			));
	}	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSendto()
	{
		$model=new Message;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Message']))
		{
			$model->attributes=$_POST['Message'];
			$model->created_date = date('Y-m-d H:i:s');
			$model->status = 0;
			$model->name = YII::app()->user->name;
			$model->email = Yii::app()->user->record->email;

			if($model->save())
				Yii::app()->user->setFlash('Success', 'Message has send to <i>'.$model->Member->first_name.'</i>.');
			$this->redirect(array('detail','id'=>$model->id_message));
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Message']))
		{
			$model->attributes=$_POST['Message'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_message));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataInbox=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id.' AND status=0',
				'order'=>'created_date DESC'
				)
			));	

		$dataAll=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id,
				'order'=>'created_date DESC'
				)
			));	

		$dataSend=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'name = "'.YII::app()->user->name.'"',
				'order'=>'created_date DESC'
				)
			));			

		$this->render('index',array(
			'dataInbox'=>$dataInbox,
			'dataAll'=>$dataAll,
			'dataSend'=>$dataSend,
			));
	}	

	public function actionClearAll($name)
	{
		$this->loadName($name)->deleteAll();
		$this->redirect(array('index'));
	}	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Message the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Message::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadName($name)
	{
		$model=Message::model()->findByAttributes(array('name'=>$name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Message $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionMy()
	{
		$dataInbox=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id.' AND status=0',
				'order'=>'created_date DESC'
				)
			));	

		$dataAll=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id,
				'order'=>'created_date DESC'
				)
			));	

		$dataSend=new CActiveDataProvider('Message',array(
			'criteria'=>array(
				'condition'=>'name = "'.YII::app()->user->name.'"',
				'order'=>'created_date DESC'
				)
			));			

		$this->render('index',array(
			'dataInbox'=>$dataInbox,
			'dataAll'=>$dataAll,
			'dataSend'=>$dataSend,
			));
	}	
}
