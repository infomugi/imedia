<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id_post
 * @property string $created_date
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property string $tags
 * @property string $keyword
 * @property string $url 
 * @property integer $views
 * @property integer $likes 
 * @property integer $id_user
 * @property integer $id_category
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, title, description, image, status, id_user, id_category', 'required','on'=>'create'),
			array('title, description, status, id_user, id_category', 'required','on'=>'update'),
			array('status, views, likes, id_user, id_category', 'numerical', 'integerOnly'=>true),
			array('title, image, tags', 'length', 'max'=>255),
			array('keyword, url', 'length', 'max'=>140),
			array('title','unique'),

			//Validation Image
			array('image', 'required', 'on'=>'changeImage'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_post, created_date, title, description, image, status, id_user, id_category', 'safe', 'on'=>'search'),
			);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Member'=>array(self::BELONGS_TO,'Users','id_user'),
			'Category'=>array(self::BELONGS_TO,'Category','id_category'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_post' => 'Post ID',
			'created_date' => 'Date',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'status' => 'Status',
			'views' => 'Views',
			'likes' => 'Likes',
			'tags' => 'Tags',
			'keyword' => 'Keyword',												
			'id_user' => 'Posted By',
			'id_category' => 'Category',
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_post',$this->id_post);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_category',$this->id_category);
		$criteria->order = "created_date DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function findPosts($UserID)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_post',$UserID);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_category',$this->id_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}	

	protected function beforeSave()
	{
		$this->created_date = date('Y-m-d', strtotime($this->created_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->created_date = date('d-m-Y', strtotime($this->created_date));
		return TRUE;
	}

	public function status($a)
	{
		if($a==1)
			return "Enable";
		else 
			return "Disable";
	}	

	public static function getPortofolio(){
		$sql = "SELECT * FROM post WHERE status=1 AND id_category=1 ORDER BY id_post DESC LIMIT 6 ";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public static function getPortofolioFull(){
		$sql = "SELECT * FROM post WHERE status=1 ORDER BY views DESC";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}	  

	public static function getPortofolioMy($data){
		$sql = "SELECT * FROM post WHERE status=1 AND id_user='".$data."' ORDER BY views DESC";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}	   

	public function seo($title){
		return preg_replace('/[^a-z0-9_-]/i', '', strtolower(str_replace(' ', '-', trim($title))));
	}	

	public function thumbSmall($imagefile){
		$image = new EasyImage(Yii::getPathOfAlias('webroot').'/image/posting/big/'.$imagefile);
		$image->scaleAndCrop(228, 151, EasyImage::RESIZE_AUTO);
		$image->save(Yii::getPathOfAlias('webroot').'/image/posting/small/'.$imagefile);
	}

	public function thumbMiddle($imagefile){
		$image = new EasyImage(Yii::getPathOfAlias('webroot').'/image/posting/big/'.$imagefile);
		$image->scaleAndCrop(450, 300, EasyImage::RESIZE_AUTO);
		$image->save(Yii::getPathOfAlias('webroot').'/image/posting/middle/'.$imagefile);
	}	

	public function thumbBig($imagefile){
		$image = new EasyImage(Yii::getPathOfAlias('webroot').'/image/posting/big/'.$imagefile);
		$mark = new EasyImage(Yii::getPathOfAlias('webroot').'/image/favicon/favicon.png');
		$image->watermark($mark, 20, 20);	
		$image->resize(1366, 1366);
		$image->save(Yii::getPathOfAlias('webroot').'/image/posting/big/'.$imagefile);
	}		

}