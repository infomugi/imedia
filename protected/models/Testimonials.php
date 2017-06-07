<?php

/**
 * This is the model class for table "testimonials".
 *
 * The followings are the available columns in table 'testimonials':
 * @property integer $id_testimonial
 * @property string $created_date
 * @property string $description
 * @property integer $status
 * @property integer $user_id
 * @property integer $customer_id
 */
class Testimonials extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Testimonials the static model class
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
		return 'testimonials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, description, status, user_id, customer_id', 'required'),
			array('status, user_id, customer_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_testimonial, created_date, description, status, user_id, customer_id', 'safe', 'on'=>'search'),
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
			'Customer'=>array(self::BELONGS_TO,'Users','customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_testimonial' => 'Id Testimonial',
			'created_date' => 'Created Date',
			'description' => 'Testimonials',
			'status' => 'Status',
			'user_id' => 'Posted By',
			'customer_id' => 'Customer Name'
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

		$criteria->compare('id_testimonial',$this->id_testimonial);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('customer_id',$this->customer_id);

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


	public static function getTestimony()
    {
        $sql = "SELECT testimonials.description as testimony, 
        users.first_name as first, users.last_name as last, 
        users.image as avatar, users.job as work 
        FROM testimonials 
        LEFT JOIN users ON testimonials.customer_id = users.id_user 
        LEFT JOIN division ON division.id_division=users.division 
        where testimonials.status=1 
        order by testimonials.id_testimonial DESC limit 3";
        $command = Yii::app()->db->createCommand($sql);
 
        return $command->queryAll();
    }    

}