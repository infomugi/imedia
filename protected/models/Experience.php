<?php

/**
 * This is the model class for table "experience".
 *
 * The followings are the available columns in table 'experience':
 * @property integer $id_experience
 * @property string $created_date
 * @property string $name
 * @property integer $category
 * @property string $description
 * @property string $date
 * @property integer $type
 * @property integer $sort
 * @property integer $status
* @property integer $status 
 */
class Experience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Experience the static model class
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
		return 'experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, name, category, description, date, status', 'required'),
			array('category, type, sort, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>130),
			array('date', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_experience, created_date, name, category, description, date, type, sort, status', 'safe', 'on'=>'search'),
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
			'Division'=>array(self::BELONGS_TO,'Division','category'),
			'Member'=>array(self::BELONGS_TO,'Users','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_experience' => 'Id Experience',
			'created_date' => 'Created Date',
			'name' => 'Name',
			'category' => 'Type',
			'description' => 'Address',
			'date' => 'Date',
			'type' => 'Type',
			'sort' => 'Sort',
			'status' => 'Status',
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

		$criteria->compare('id_experience',$this->id_experience);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('status',$this->status);

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

	public function type($data){
		if($data==3){
			return "Work Experience";
		}else{
			return "Education";
		}
	}	

	public static function getExperience($data)
    {
        $sql = "SELECT experience.description as description, 
        experience.name as job, experience.date as dates, 
        users.first_name as first, users.last_name as last, 
        users.image as avatar, division.name as type 
        FROM experience 
        LEFT JOIN users ON experience.user_id = users.id_user 
        LEFT JOIN division ON division.id_division=experience.category 
        where experience.status=1  AND experience.type=3 AND experience.user_id='".$data."' 
        order by experience.sort DESC limit 3";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }  	

	public static function getEducation($data)
    {
        $sql = "SELECT experience.description as description, 
        experience.name as school, experience.date as dates, 
        users.first_name as first, users.last_name as last, 
        users.image as avatar, division.name as type 
        FROM experience 
        LEFT JOIN users ON experience.user_id = users.id_user 
        LEFT JOIN division ON division.id_division=experience.category 
        where experience.status=1 AND experience.type=4 AND experience.user_id='".$data."' 
        order by experience.sort DESC limit 3";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }  	    


}