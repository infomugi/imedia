<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $job
 * @property string $maps
 * @property string $phone
 * @property string $pin    
 * @property string $birth
 * @property integer $gender
 * @property string $facebook
 * @property string $twitter
 * @property string $gplus
 * @property string $image
 * @property string $background
 * @property string $cover
 * @property integer $verified
 * @property integer $status
 * @property integer $level
 * @property integer $division
 * @property string $create_date
 * @property string $last_visit
 * @property string $ipaddress 
 * @property integer $active
 * @property integer $views
 */
class Users extends CActiveRecord
{
	public $repeat_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, repeat_password, email, first_name, last_name, location, website, bio, job, phone, pin, birth, gender, facebook, twitter, gplus, division', 'required','on'=>'create'),
			array('username, email, first_name, last_name, location, website, bio, job, phone, pin, birth, gender, facebook, twitter, gplus, division', 'required','on'=>'update'),
			array('username, password, repeat_password, email', 'required','on'=>'register'),
			array('gender, verified, status, level, division, active, views', 'numerical', 'integerOnly'=>true),
			array('username, first_name, last_name, ipaddress, job, phone, pin', 'length', 'max'=>32),
			array('password, email, facebook, gplus, background, maps', 'length', 'max'=>256),
			array('location, website, twitter, image, cover', 'length', 'max'=>128),
			array('bio', 'length', 'max'=>160),
			
			array('level', 'required','on'=>'level'),
			array('verified', 'required','on'=>'team'),
			array('active', 'required','on'=>'log'),
			array('views', 'required','on'=>'look'),
			
			// Validation Username
			array('username', 'match' ,'pattern'=>'/^[A-Za-z0-9_]+$/u','message'=> 'Username only fill number and alphabet.'),
			array('username','filter', 'filter'=>'strtolower'),		
			array('password','length','max'=>64, 'min'=>6),			
			array('username','unique','on'=>'create, register'),
			array('email','unique','on'=>'create, register'),
			array('email','email','on'=>'create, register'),

			// Validation Avatar and Cover Required
			array('image', 'required', 'on'=>'changeImage'),
			array('cover', 'required', 'on'=>'changeCover'),

			//Validation Password Repeat
			array('repeat_password, password','required','on'=>'changePassword, resetPassword, register'),
			array('repeat_password','length','max'=>64, 'min'=>6),
			array('password', 'compare', 'compareAttribute'=>'repeat_password','on'=>'changePassword, resetPassword, create, register'), 			

			//Validation Image
			array('image', 'file', 'allowEmpty'=>false, 'types'=>'jpg, gif, png', 'on'=>'changeImage',
			             // 'message' => 'Upload Valid Image!',  // Error message
			             // 'wrongType'=>'File type is Invalid',
			             // 'minSize'=>10,// 1MB
			             // 'maxSize'=>1024,
			             // 'maxFiles'=>2,
			             // 'tooLarge'=>'File Size Too Large',//Error Message
			             // 'tooSmall'=>'File Size Too Small',//Error Message
			             // 'tooMany'=>'Too Many Files Uploaded',//Error Message
				),  		

			array('cover', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'on'=>'changeCover'),  				             	

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, username, password, email, first_name, last_name, location, website, bio, birth, gender, facebook, twitter, gplus, image, background, cover, verified, status, level, division, create_date, last_visit', 'safe', 'on'=>'search'),
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
			'Division'=>array(self::BELONGS_TO,'Division','division'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'location' => 'Location',
			'website' => 'Website',
			'bio' => 'Bio',
			'birth' => 'Birth',
			'gender' => 'Gender',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'gplus' => 'Google +',
			'image' => 'Image',
			'background' => 'Background',
			'cover' => 'Cover',
			'verified' => 'Verified',
			'status' => 'Status',
			'level' => 'Level',
			'active' => 'Active',
			'division' => 'Division',
			'create_date' => 'Create Date',
			'last_visit' => 'Last Visit',
			'ipaddress' => 'IP Address',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('gplus',$this->gplus,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('verified',$this->verified);
		$criteria->compare('status',$this->status);
		$criteria->compare('level',$this->level);
		$criteria->compare('active',$this->active);
		$criteria->compare('division',$this->division);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_visit',$this->last_visit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function activity($UserID)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$UserID);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('gplus',$this->gplus,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('verified',$this->verified);
		$criteria->compare('status',$this->status);
		$criteria->compare('level',$this->level);
		$criteria->compare('active',$this->active);
		$criteria->compare('division',$this->division);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_visit',$this->last_visit,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}


	public static function getSumMember()
	{
		$sql = "SELECT COUNT(id_user) as totalMember FROM Users";
		$command = Yii::app()->db->createCommand($sql);

		return $command->queryAll();
	} 		

	protected function beforeSave()
	{
		$this->birth = date('Y-m-d', strtotime($this->birth));
		$this->create_date = date('Y-m-d', strtotime($this->create_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->birth = date('d-m-Y', strtotime($this->birth));
		$this->create_date = date('d-m-Y', strtotime($this->create_date));
		return TRUE;
	}    

	public function level($a)
	{
		if($a==0)
			return "Unverified";
		else if($a==1)
			return "Administrator";
		else if($a==2)
			return "Member";	
		else if($a==3)
			return "Customer";			
		else 
			return "Unknow";
	}	

	public function status($a)
	{
		if($a==0)
			return "Unverified";
		else if($a==1)
			return "Active";
		else if($a==2)
			return "Not Active";					
		else 
			return "Unknow";
	}

	public function active($a)
	{
		if($a==0)
			return "Offline";
		else 
			return "Online";
	}	

	public static function getActiveUsers()
	{
		$sql = "SELECT id_user as id, username, image, active, last_visit FROM users where active=1 order by last_visit DESC limit 10";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public static function getTeam(){
		$sql = 
		"SELECT 
		users.first_name as firstname, users.last_name as lastname,
		users.image as avatar, division.name as team, users.job as work,
		users.bio as about, users.email as email
		FROM users 
		LEFT JOIN division 
		ON users.division=division.id_division
		WHERE users.verified=1 
		ORDER BY users.first_name ASC LIMIT 4";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}	

	public static function showAvatar($UserID)
	{
		$model= Users::model()->findByPk($UserID);
		return $model->image;
	}	

	public function thumbAvatar($imagefile){
		$image = new EasyImage(Yii::getPathOfAlias('webroot').'/image/avatar/'.$imagefile);
		$image->scaleAndCrop(128, 128, EasyImage::RESIZE_AUTO);
		$image->save(Yii::getPathOfAlias('webroot').'/image/avatar/'.$imagefile);
	}	

	public function thumbCover($imagefile){
		$image = new EasyImage(Yii::getPathOfAlias('webroot').'/image/cover/'.$imagefile);
		// $mark = new EasyImage(Yii::getPathOfAlias('webroot').'/image/favicon/favicon.png');
		$image->scaleAndCrop(1400, 512, EasyImage::RESIZE_AUTO);
		// $image->watermark($mark, 20, 20);	
		$image->render('gif', 60);	
		$image->save(Yii::getPathOfAlias('webroot').'/image/cover/'.$imagefile);
	}			

}