<?php

/**
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property integer $id_file
 * @property string $created_date
 * @property string $name
 * @property string $format 
 * @property integer $category
 * @property integer $user_id
 * @property integer $status
 */
class Files extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Files the static model class
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
		return 'files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, name, category, user_id', 'required'),
			array('category, user_id, status', 'numerical', 'integerOnly'=>true),
			array('name, format', 'length', 'max'=>100),
			array('name', 'file', 'allowEmpty'=>true, 
					'types'=>'jpg, gif, png, swf, doc, docx, pdf, xls, xlsx, txt, rar, zip', 
					'on'=>'upload'),  				             	

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_file, created_date, name, category, user_id, status', 'safe', 'on'=>'search'),
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
			'Category'=>array(self::BELONGS_TO,'Category','category'),			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_file' => 'Id File',
			'created_date' => 'Upload Date',
			'name' => 'File',
			'format' => 'File Format',
			'category' => 'Category',
			'user_id' => 'User',
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

		$criteria->compare('id_file',$this->id_file);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('format',$this->format,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('user_id',$this->user_id);
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

}