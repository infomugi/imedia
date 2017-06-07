<?php

class FilesController extends Controller
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
				'actions'=>array('upload','update','view','delete','admin','index','publish','default','my'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index','upload','publish','default','delete','my','update'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpload()
	{
		$model=new Files;
		$model->setScenario('upload');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Files']))
		{
			$model->attributes=$_POST['Files'];
			$model->user_id = YII::app()->user->id;
			$model->created_date = date('Y-m-d H:i:s');
			$model->status = 0;
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'name'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'name'); 
				$model->name=$model->user_id.$model->category.date('hms').'.'.$tmp->extensionName; 
			}
			$model->format = $tmp->extensionName;
			//$userid,$description,$activityid,$type,$point,$status
			Activities::model()->my($model->user_id,"Upload a file  ".$model->name,$model->id_file,7,3,16);

			if($model->save()){
				if(strlen(trim($model->name)) > 0) {
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/'.$model->name);
				}
				Yii::app()->user->setFlash('Success', '<i>'.$model->name.'</i> has been uploaded.');
				$this->redirect(array('view','id'=>$model->id_file));
			}
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

		if(isset($_POST['Files']))
		{
			$model->attributes=$_POST['Files'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_file));
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
		$dataProvider=new CActiveDataProvider('Files');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionMy()
	{
		$dataMyfiles=new CActiveDataProvider('Files',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id,
				'order'=>'created_date DESC'
				)
			));	

		$this->render('my',array(
			'dataMyfiles'=>$dataMyfiles,
			));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Files('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Files']))
			$model->attributes=$_GET['Files'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Files the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Files::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Files $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='files-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPublish($id)
	{
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->save();
		Yii::app()->user->setFlash('Success', '<i>'.$model->name.'</i> has published.');
		$this->redirect(array('view','id'=>$model->id_file));
	}	

	public function actionDefault($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		Yii::app()->user->setFlash('warning', '<b>Successfully!</b> <i>'.$model->name.'</i> has set draft.');
		$this->redirect(array('view','id'=>$model->id_file));

	}		

}
