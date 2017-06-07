<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id_category
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property integer $status
 * @property integer $id_user
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, status, description, icon', 'required'),
			array('status, id_user', 'numerical', 'integerOnly'=>true),
			array('icon', 'length', 'max'=>25),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('name','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_category, name, description, icon, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_category' => 'Id Category',
			'name' => 'Name',
			'description' => 'Description',
			'icon' => 'Icon',
			'status' => 'Status',
			'id_user' => 'User ID',
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

		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getExpertise(){
    	$sql = "SELECT * FROM category WHERE status=1 LIMIT 4";
    	$command = YII::app()->db->createCommand($sql);
    	return $command->queryAll();
    }	

    public static function getCategory(){
    	$sql = "SELECT * FROM category WHERE status=1";
    	$command = YII::app()->db->createCommand($sql);
    	return $command->queryAll();
    }	    

    public static function getCategoryMy($data){
    	// $sql = "SELECT * FROM category WHERE status=1 AND id_user='".$data."'";
    	$sql = "SELECT * FROM category WHERE status=1";
    	$command = YII::app()->db->createCommand($sql);
    	return $command->queryAll();
    }	        
    
}