<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $tags;
	public $keyword;
	public $url;
	public $image;
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
				'actions'=>array('view','index'),
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
		$this->layout="frontend_post";
		$model=Post::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			$model->views += 1;
			$model->save();
		}
		$this->render('view_front',array(
			'model'=>$this->loadModel($id),
			));			
	}

	public function actionPost($url)
	{
		$this->layout="frontend_post";
		$model=Post::model()->findByAttributes(array('url'=>$url));
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			$model->views += 1;
			$model->save();
		}
		$this->render('view_front',array(
			'model'=>$this->loadPosting($url),
			));			
	}	

	public function actionCategory($name)
	{
		$this->layout="frontend_post";
		$category=Category::model()->findByAttributes(array('name'=>$name));
		$dataProvider=new CActiveDataProvider('Post',array(
			'criteria'=>array(
				'condition'=>'id_category='.$category->id_category,
				'order'=>'created_date DESC'
				)
			));
		$this->render('index_front',array(
			'dataProvider'=>$dataProvider,
			));		
	}		


	public function actionLikes($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			$model->likes += 1;
			$model->save();
		}
		$this->redirect(array('post','url'=>$model->url));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->layout="frontend_post";
		$dataProvider=new CActiveDataProvider('Post',array(
			'criteria'=>array(
				'order'=>'created_date DESC'
				)
			));
		$this->render('index_front',array(
			'dataProvider'=>$dataProvider,
			));			
	}


	public function actionPortofolio()
	{
		$this->layout="frontend_portofolio";
		$dataProvider=new CActiveDataProvider('Post',array(
			'criteria'=>array(
				'order'=>'created_date DESC'
				)
			));
		$this->render('index_front_portofolio',array(
			'dataProvider'=>$dataProvider,
			));			
	}	

	// public function actionCategory($id='')
	// {
	// 	$this->layout="frontend_post";
	// 	$criteria = new CDbCriteria();
	// 	if(strlen($id)>0)
	// 	$criteria->addSearchCondition('id_category', $id, true, 'OR');
	// 	$dataProvider = new CActiveDataProvider('Post', array('criteria'=>$criteria));
	// 	$this->render('index_front', array('dataProvider'=>$dataProvider));
	// }	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadPosting($url)
	{
		$model=Post::model()->findByAttributes(array('url'=>$url));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	public function loadCategory($name)
	{
		$model=Category::model()->findByAttributes(array('name'=>$name));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
