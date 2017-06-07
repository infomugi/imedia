<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id_setting
 * @property string $created_date
 * @property string $update_date
 * @property string $name
 * @property string $description
 * @property string $content
 * @property integer $type
 * @property integer $user_id
 * @property integer $status
 * @property integer $active
 */
class Setting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, type, user_id, status, active', 'required'),
			array('type, user_id, status', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>100000),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_setting, created_date, update_date, name, description, content, type, user_id, status', 'safe', 'on'=>'search'),
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
			'Member'=>array(self::BELONGS_TO,'Users','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_setting' => 'Id Setting',
			'created_date' => 'Created Date',
			'update_date' => 'Update Date',
			'name' => 'Name',
			'description' => 'Description',
			'content' => 'Content',
			'type' => 'Type',
			'user_id' => 'User',
			'status' => 'Status',
			'active' => 'Active',
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

		$criteria->compare('id_setting',$this->id_setting);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->order = "name ASC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
		$this->created_date = date('Y-m-d', strtotime($this->created_date));
		$this->update_date = date('Y-m-d', strtotime($this->update_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->created_date = date('d-m-Y', strtotime($this->created_date));
		$this->update_date = date('d-m-Y', strtotime($this->update_date));
		return TRUE;
	}	

	public function type($a)
	{
		if($a==1)
			return "Template";
		else 
			return "Widget";
	}	

	public function status($a)
	{
		if($a==1)
			return "Frontend";
		else 
			return "Backend";
	}	

	public function active($a)
	{
		if($a==1)
			return "Enable";
		else 
			return "Disable";
	}				
}