<?php

/**
 * This is the model class for table "skill".
 *
 * The followings are the available columns in table 'skill':
 * @property integer $id_skill
 * @property string $skill
 * @property integer $percentage
 * @property integer $color 
 * @property integer $user_id
 */
class Skill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Skill the static model class
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
		return 'skill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill, percentage, color, user_id', 'required'),
			array('percentage, user_id, color', 'numerical', 'integerOnly'=>true),
			array('skill', 'length', 'max'=>25),

			// Validation Username
			array('percentage', 'match' ,'pattern'=>'/^[0-9]+$/u',
				'message'=> 'Percentage only fill number.'),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_skill, skill, percentage, user_id', 'safe', 'on'=>'search'),
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
			'id_skill' => 'Id Skill',
			'skill' => 'Skill',
			'percentage' => 'Percentage',
			'user_id' => 'User',
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

		$criteria->compare('id_skill',$this->id_skill);
		$criteria->compare('skill',$this->skill,true);
		$criteria->compare('percentage',$this->percentage);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function colorStatus($color){
		if($color==1){
			return "primary";
		}elseif($color==2){
			return "info";
		}elseif($color==3){
			return "danger";
		}elseif($color==4){
			return "warning";
		}elseif($color==5){
			return "success";			
		}else{
			return "inverse";
		}	
	}
}