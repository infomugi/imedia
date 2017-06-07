<?php

class UsersController extends Controller
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
				'users'=>array('@'),
				),
			array('allow',
				'actions'=>array('create','update','edit','view','delete','admin','index','changeimage', 'changecover','changepassword','team','default','setadmin','setuser'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('update','view','changeimage', 'changecover','changepassword'),
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
		$model=$this->loadModel($id);
		$views=Users::model()->findByPk($id);
		$views->setScenario('look');
		$views->views += 1;
		$views->save();		

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
				'condition'=>'user_id = '.$model->id_user.' AND type=3',
				'order'=>'user_id DESC'
				)
			));	

		$dataEducation=new CActiveDataProvider('Experience', array(
			'criteria'=>array(
				'condition'=>'user_id = '.$model->id_user.' AND type=4',
				'order'=>'user_id DESC'
				)
			));		


		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('view_ajax',array(
				'model'=>$this->loadModel($id), 
				'dataActivity'=>$dataActivity,
				'dataSkill'=>$dataSkill
				), false, true);
		}
		else
		{
			$model->setScenario('update');
			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				if($model->save())
					Yii::app()->user->setFlash('Success', 'Profile '.$model->first_name.' has been update.');
					$this->redirect(array('profile','view'=>$model->username));
			}			
			$this->layout="profile";
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				'dataActivity'=>$dataActivity,
				'dataSkill'=>$dataSkill,
				'dataExperience'=>$dataExperience,
				'dataEducation'=>$dataEducation

				));

		}

	}	

	public function actionProfile($view)
	{
		$model=$this->loadProfile($view);
		$user = Yii::app()->user->id;
		
		if($model->id_user!=$user):
		$views=Users::model()->findByAttributes(array('username'=>$view));
		$views->setScenario('look');
		$views->views += 1;
		$views->save();		
		endif;

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
				'condition'=>'user_id = '.$model->id_user.' AND type=3',
				'order'=>'user_id DESC'
				)
			));	

		$dataEducation=new CActiveDataProvider('Experience', array(
			'criteria'=>array(
				'condition'=>'user_id = '.$model->id_user.' AND type=4',
				'order'=>'user_id DESC'
				)
			));								

			// if($view==$user){

			$model->setScenario('update');
			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				if($model->save())
					Yii::app()->user->setFlash('Success', 'Profile '.$model->first_name.' has been update.');
					$this->redirect(array('profile','view'=>$model->username));
			}			
			$this->layout="profile";
			$this->render('view',array(
				'model'=>$this->loadProfile($view),
				'dataActivity'=>$dataActivity,
				'dataSkill'=>$dataSkill,
				'dataExperience'=>$dataExperience,
				'dataEducation'=>$dataEducation

				));

				// }else{
				// 	throw new CHttpException(403,'You not authorized to this perfom.');
				// }
	}		


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->level = 3;
			$model->image = "default.png";
			$model->cover = "default.png";
			$model->background = "#FFF";			
			$model->password = md5($model->password);
			$model->repeat_password = md5($model->repeat_password);
			if($model->save())
				//$userid,$description,$activityid,$type,$point,$status
				Activities::model()->my($model->id_user,"Add account ".$model->username,$model->id_user,5,50,6);
				Yii::app()->user->setFlash('Success', 'Account has been created.');
				$this->redirect(array('profile','view'=>$model->username));
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
	public function actionUpdate($view)
	{
		$model=$this->loadProfile($view);		
		$model->setScenario('update');
		if($view==Yii::app()->user->name){

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];

				//$userid,$description,$activityid,$type,$point,$status
				Activities::model()->my($model->id_user,"Update profile ".$model->username,$model->id_user,8,2,7);

				if($model->save())
					Yii::app()->user->setFlash('Success', 'Profile has been update.');
					$this->redirect(array('profile','view'=>$model->username));
			}

			$this->render('update',array(
				'model'=>$model,
				));

		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}
	}

	public function actionEdit($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				Yii::app()->user->setFlash('Success', 'Profile has been update.');
				$this->redirect(array('profile','view'=>$model->username));
		}

		$this->render('update',array(
			'model'=>$model,
			));

	}	

	public function actionChangePassword($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('changePassword');
		if($id==Yii::app()->user->record->id_user){

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$model->password = md5($model->password);
				$model->repeat_password = md5($model->repeat_password);
				if($model->save())
					Yii::app()->user->setFlash('Success', 'Password has been update.');
					$this->redirect(array('profile','view'=>$model->username));
			}

			$this->render('password',array(
				'model'=>$model,
				));

		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}
	}	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model->loadModel($id);
		
		if($model->id_user!=Yii::app()->user->id){		
			$model->delete();
		}else{
			throw new CHttpException(500,'Can not remove your account.');
		}		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionLogs()
	{
		$dataProvider=new CActiveDataProvider('Activities',array(
			'criteria'=>array(
				'condition'=>'user_id = '.YII::app()->user->id,
				'order'=>'created_date DESC'
				)
			));
		$this->render('logs',array(
			'dataProvider'=>$dataProvider,
			));
	}	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadProfile($view)
	{
		$model=Users::model()->findByAttributes(array('username'=>$view));
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


	public function actionChangeImage($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('changeImage');
		if($id==Yii::app()->user->record->id_user){

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$tmp;
				if(strlen(trim(CUploadedFile::getInstance($model,'image'))) > 0) 
				{ 
					$tmp=CUploadedFile::getInstance($model,'image'); 
					$model->image=$model->username.'.'.$tmp->extensionName; 
				}

				if($model->save()){
					if(strlen(trim($model->image)) > 0) 
						$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/avatar/'.$model->image);
						Users::model()->thumbAvatar($model->image);
						Yii::app()->user->setFlash('Success', 'Avatar '.$model->first_name.' has been update.');
					$this->redirect(array('profile','view'=>$model->username));
				}
			}

			$this->render('image',array(
				'model'=>$model,
				));

		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}
	}


	public function actionChangeCover($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('changeCover');
		if($id==Yii::app()->user->record->id_user){
			
			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$tmp;
				if(strlen(trim(CUploadedFile::getInstance($model,'cover'))) > 0) 
				{ 
					$tmp=CUploadedFile::getInstance($model,'cover'); 
					$model->cover=$model->username.'.'.$tmp->extensionName; 
				}

				if($model->save()){
					if(strlen(trim($model->cover)) > 0) 
						$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/cover/'.$model->cover);
						Users::model()->thumbCover($model->cover);
						Yii::app()->user->setFlash('Success', 'Cover '.$model->first_name.' has been update.');
					$this->redirect(array('profile','view'=>$model->username));
				}
			}

			$this->render('cover',array(
				'model'=>$model,
				));

		}else{
			throw new CHttpException(403,'You not authorized to this perfom.');
		}
	}		

	public function actionTeam($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('team');
		$model->verified = 1;
		$model->save();
		$this->redirect(array('index'));
	}	

	public function actionDefault($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('team');
		$model->verified = 0;
		$model->save();
		$this->redirect(array('index'));
	}		

	public function actionSetAdmin($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('level');
		$model->level = 1;
		$model->save();
		Yii::app()->user->setFlash('Info', '<i>'.$model->first_name.'</i> set as Administrator.');
		$this->redirect(array('index'));
	}	

	public function actionSetUser($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('level');
		$model->level = 2;
		$model->save();
		Yii::app()->user->setFlash('Success', '<i>'.$model->first_name.'</i> set as Member.');
		$this->redirect(array('index'));
	}			


}
