<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $id_message
 * @property string $created_date
 * @property string $name
 * @property string $email
 * @property string $message
 * @property integer $read
 * @property integer $status
 * @property integer $user_id 
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, name, email, message, status, user_id', 'required'),
			array('read, status, user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('email', 'length', 'max'=>50),
			array('email','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_message, created_date, name, email, message, read, status', 'safe', 'on'=>'search'),
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
			'id_message' => 'Id Message',
			'created_date' => 'Created Date',
			'name' => 'Name',
			'email' => 'Email',
			'message' => 'Message',
			'read' => 'Read',
			'status' => 'Status',
			'user_id'=>'Send to'
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

		$criteria->compare('id_message',$this->id_message);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('read',$this->read);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	protected function beforeSave()
	{
		$this->created_date = date('Y-m-d H:i:s', strtotime($this->created_date));
		return TRUE;
	}
	
}