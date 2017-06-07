<?php

class SettingController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','publish','default'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
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

		$model=$this->loadModel($id);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			$model->update_date = date('Y-m-d H:i:s');
			if($model->save())
				Yii::app()->user->setFlash('Success', '<b>'.$model->name.'</b> has been update.');
				$this->redirect(array('view','id'=>$model->id_setting));
		}
				
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('view_ajax',array(
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Setting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			$model->user_id = YII::app()->user->id;
			$model->status = 0;
			$model->created_date = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_setting));
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

		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			$model->update_date = date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_setting));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Setting', array(
			'criteria'=>array(
				'condition'=>'status=1',
				'order'=>'name ASC',
				)
			));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Setting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Setting']))
			$model->attributes=$_GET['Setting'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Setting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Setting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='setting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPublish($id)
	{
		$model=$this->loadModel($id);
		$model->update_date = date('Y-m-d H:i:s');
		$model->active = 1;
		$model->save();
		Yii::app()->user->setFlash('Success', '<i>'.$model->name.'</i> has enable.');
		$this->redirect(array('index'));
	}	

	public function actionDefault($id)
	{
		$model=$this->loadModel($id);
		$model->update_date = date('Y-m-d H:i:s');		
		$model->active = 0;
		$model->save();
		Yii::app()->user->setFlash('Warning', '<i>'.$model->name.'</i> has disable.');
		$this->redirect(array('index'));
	}	

}
