<?php

class ExperienceController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','addexperience','addeducation','default','publish','up','down'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index','create','update','default','publish','addeducation','addexperience'),
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
	public function actionAddEducation($id,$type)
	{
		$model=new Experience;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($id==Yii::app()->user->record->id_user){
			if(isset($_POST['Experience']))
			{
				$model->attributes=$_POST['Experience'];
				$model->created_date = date('Y-m-d H:i:s');
				$model->type = $type;
				$model->status = 0;
				$model->user_id = $id;

				//$userid,$description,$activityid,$type,$point,$status
				Activities::model()->my($id,"Add education experience ".$model->name,$model->id_experience,5,3,13);

				if($model->save()){
					$this->redirect(array('view','id'=>$model->id_experience));
				}
			}

			$this->render('create',array(
				'model'=>$model,
				'type'=>$type,
				));
		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}
	}

	public function actionAddExperience($id,$type)
	{
		$model=new Experience;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($id==Yii::app()->user->record->id_user){
			if(isset($_POST['Experience']))
			{
				$model->attributes=$_POST['Experience'];
				$model->created_date = date('Y-m-d H:i:s');
				$model->type = $type;
				$model->status = 0;
				$model->user_id = $id;

				//$userid,$description,$activityid,$type,$point,$status
				Activities::model()->my($id,"Add work experience ".$model->name,$model->id_experience,5,3,14);

				if($model->save()){
					$this->redirect(array('view','id'=>$model->id_experience));
				}
			}

			$this->render('create',array(
				'model'=>$model,
				'type'=>$type,
				));
		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$type)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Experience']))
		{
			$model->attributes=$_POST['Experience'];
			$model->type = $type;

			//$userid,$description,$activityid,$type,$point,$status
			Activities::model()->my($id,"Update work experience ".$model->name,$model->id_experience,6,1,17);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_experience));
		}

		$this->render('update',array(
			'model'=>$model,
			'type'=>$type,
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
			Yii::app()->user->setFlash('Warning', 'Data has been remove.');
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('profile/'.YII::app()->user->name));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Experience the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Experience::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Experience $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='experience-form')
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
		$this->redirect(array('view','id'=>$model->id_experience));
	}	

	public function actionDefault($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		Yii::app()->user->setFlash('Warning', '<i>'.$model->name.'</i> has set draft.');
		$this->redirect(array('view','id'=>$model->id_experience));

	}		

	public function actionUp($id)
	{
		$model=$this->loadModel($id);
		$model->sort += 1;
		$model->save();
		Yii::app()->user->setFlash('Success', '<i>'.Division::model()->type($model->type).'</i> '.$model->name.' has been update.');
		$this->redirect(array('users/profile','view'=>$model->Member->username));
	}	

	public function actionDown($id)
	{
		$model=$this->loadModel($id);
		$model->sort -= 1;
		$model->save();
		Yii::app()->user->setFlash('Success', '<i>'.Division::model()->type($model->type).'</i> '.$model->name.' has been update.');
		$this->redirect(array('users/profile','view'=>$model->Member->username));
	}		

}
