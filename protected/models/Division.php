<?php

/**
 * This is the model class for table "division".
 *
 * The followings are the available columns in table 'division':
 * @property integer $id_division
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $type 
 */
class Division extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Division the static model class
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
		return 'division';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, status, type', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_division, name, description, status, type', 'safe', 'on'=>'search'),
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
			'id_division' => 'Id Division',
			'name' => 'Name',
			'description' => 'Description',
			'status' => 'Status',
			'type' => 'Type',
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

		$criteria->compare('id_division',$this->id_division);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getName($DivisionID)
    {
        $sql = "SELECT name FROM division where id_division='".$DivisionID."'";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }

	public function type($a)
	{
		if($a==1)
			return "Group";
		else if($a==2)
			return "Team";
		else if($a==3)
			return "Experience";					
		else 
			return "Education";
	}	    	
}