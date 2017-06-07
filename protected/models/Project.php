<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $title
 * @property string $current_status
 * @property string $description
 * @property string $start_date
 * @property string $deadline
 * @property integer $status
 * @property double $amount
 * @property integer $month
 * @property integer $payment_method
 * @property integer $id_customer
 * @property integer $id_user
 * @property integer $id_category
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, current_status, description, start_date, deadline, status, amount, payment_method, id_customer, id_user, id_category', 'required'),
			array('status, month, payment_method, id_customer, id_user, id_category', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('title', 'length', 'max'=>100),
			array('current_status', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, current_status, description, start_date, deadline, status, amount, month, payment_method, id_customer, id_user, id_category', 'safe', 'on'=>'search'),
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
			'projectdetail' => array(self::HAS_MANY, 'projectdetail', 'id'),
			'payment_term' => array(self::BELONGS_TO, 'payment_term', 'payment_method'),
			'useraccounts' => array(self::BELONGS_TO, 'useraccounts', 'id_user'),
			'customer' => array(self::BELONGS_TO, 'customer', 'id_customer'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'current_status' => 'Current Status',
			'description' => 'Description',
			'start_date' => 'Start Date',
			'deadline' => 'Deadline',
			'status' => 'Status',
			'amount' => 'Amount',
			'month' => 'Month',
			'payment_method' => 'Payment Method',
			'id_customer' => 'Id Customer',
			'id_user' => 'Id User',
			'id_category' => 'Id Category',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('current_status',$this->current_status,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('month',$this->month);
		$criteria->compare('payment_method',$this->payment_method);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_category',$this->id_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	protected function beforeSave()
	{
		$this->start_date = date('Y-m-d', strtotime($this->start_date));
		$this->deadline = date('Y-m-d', strtotime($this->deadline));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->start_date = date('d-m-Y', strtotime($this->start_date));
		$this->deadline = date('d-m-Y', strtotime($this->deadline));
		return TRUE;
	}
	
	public function countProject()
	{
		return Projectdetail::model()->count('id_project=:id_project',array(':id_project'=>$this->id_project));   
	}

	public function countstatus()
	{
		return Projectdetail::model()->count('id_project=:id_project',array(':id_project'=>$this->id_project));   
	}

	public static function getSumProject()
	{
		$sql = "SELECT COUNT(id_project) as totalProject FROM Project";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	} 

	public static function getTitleProject()
	{
		$sql = "SELECT title as titleProject FROM Project ORDER BY id_project DESC LIMIT 1";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	} 	  		

	public function fetchTotal($records)
	{
		$amount=0;
		foreach($records as $record)
			$amount+=$record->amount;
		return $amount;
	} 

	public function status($task)
	{
		if($task==0)
			return "Start";
		else if($task==1)
			return "Done";
		else 
			return "None";
	}

	public function color($label)
	{
		if($label==0)
			return "warning";
		else if($label==1)
			return "success";
		else if($label==2)
			return "info";		
		else 
			return "danger";
	}		

}