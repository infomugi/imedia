<?php

/**
 * This is the model class for table "activities".
 *
 * The followings are the available columns in table 'activities':
 * @property integer $id_activities
 * @property string $created_date
 * @property integer $type
 * @property string $description
 * @property integer $activity_id
 * @property integer $user_id
 * @property integer $point
 * @property integer $status
 */
class Activities extends CActiveRecord
{
	public $data;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activities the static model class
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
		return 'activities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('type, activity_id, user_id, point, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_activities, created_date, type, description, activity_id, user_id, point, status', 'safe', 'on'=>'search'),
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
			'id_activities' => 'Id Activities',
			'created_date' => 'Created Date',
			'type' => 'Type',
			'description' => 'Description',
			'activity_id' => 'Activity',
			'user_id' => 'User',
			'point' => 'Point',
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

		$criteria->compare('id_activities',$this->id_activities);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('point',$this->point);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public function activityType($type){
		if($type==0){
			return "Logout";
		}elseif($type==1){
			return "Login";
		}elseif($type==2){
			return "Created";
		}elseif($type==3){
			return "Like";
		}elseif($type==4){
			return "Published";
		}elseif($type==5){
			return "Add";
		}elseif($type==6){
			return "Edit";
		}elseif($type==7){
			return "Upload";	
		}elseif($type==8){
			return "Update";
		}elseif($type==9){
			return "Request";									
		}else{
			return "Unknow";
		}
	}

	public function activityDescription($status){
		if($status==0){
			return "Logout from system";
		}elseif($status==1){
			return "Login to system";
		}elseif($status==2){
			return "Created new post";
		}elseif($status==3){
			return "Like a post";
		}elseif($status==4){
			return "Published a post";
		}elseif($status==5){
			return "Add a testimonial";
		}elseif($status==6){
			return "Add a account";
		}elseif($status==7){
			return "Edit profile";
		}elseif($status==8){
			return "Edit cover";
		}elseif($status==9){
			return "Edit avatar";
		}elseif($status==10){
			return "Edit posting";
		}elseif($status==11){
			return "Edit skill";
		}elseif($status==12){
			return "Add file";	
		}elseif($status==13){
			return "Add education";	
		}elseif($status==14){
			return "Add experience";	
		}elseif($status==15){
			return "Edit post";																	
		}elseif($status==16){
			return "Upload a file";																	
		}elseif($status==17){
			return "Update a experience";	
		}elseif($status==18){
			return "Request password reset";
		}elseif($status==19){
			return "Reset password";
		}elseif($status==20){
			return "Activated the account";										
		}else{
			return "Unknow";
		}
	}	

	function timeAgo($original)
	{
		date_default_timezone_set('Asia/Jakarta');
		$chunks = array(
			array(60 * 60 * 24 * 365, 'tahun'),
			array(60 * 60 * 24 * 30, 'bulan'),
			array(60 * 60 * 24 * 7, 'minggu'),
			array(60 * 60 * 24, 'hari'),
			array(60 * 60, 'jam'),
			array(60, 'menit'),
			);

		$today = time();
		$since = $today - $original;

		if ($since > 604800)
		{
			$print = date("M jS", $original);
			if ($since > 31536000)
			{
				$print .= ", " . date("Y", $original);
			}
			return $print;
		}

		for ($i = 0, $j = count($chunks); $i < $j; $i++)
		{
			$seconds = $chunks[$i][0];
			$name = $chunks[$i][1];

			if (($count = floor($since / $seconds)) != 0)
				break;
		}

		$print = ($count == 1) ? '1 ' . $name : "$count {$name}";
		return $print . ' yang lalu';
	}	
	
	function getGeoIP($ip = null, $jsonArray = false) {
		try {
		// If no IP is provided use the current users IP
			if($ip == null) {
				$ip   = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
			}
		// If the IP is equal to 127.0.0.1 (IPv4) or ::1 (IPv6) then cancel, won't work on localhost
			if($ip == "127.0.0.1" || $ip == "::1") {
				throw new Exception('You are on a local sever, this script won\'t work right.');
			}
		// Make sure IP provided is valid
			if(!filter_var($ip, FILTER_VALIDATE_IP)) {
				throw new Exception('Invalid IP address "' . $ip . '".');
			}
			if(!is_bool($jsonArray)) {
				throw new Exception('The second parameter must be a boolean - true (return array) or false (return JSON object); default is false.');
			}
		// Fetch JSON data with the IP provided
			$url  = "http://freegeoip.net/json/" . $ip;
		// Return the contents, supress errors because we will check in a bit
			$json = @file_get_contents($url);
		// Did we manage to get data?
			if($json === false) {
				return false;
			}
		// Decode JSON
			$json = json_decode($json, $jsonArray);
		// If an error happens we can assume the JSON is bad or invalid IP
			if($json === null) {
			// Return false
				return false;
			} else {
			// Otherwise return JSON data
				return $json;
			}
		} catch(Exception $e) {
			return $e->getMessage();
		}
	}

	public function my($userid,$description,$activityid,$type,$point,$status){
		$activity=new Activities;
		$activity->user_id = $userid;
		$activity->description = $description;
		$activity->activity_id = $activityid;
		$activity->type = $type;
		$activity->point = $point;
		$activity->status = $status;
		$activity->created_date = date('Y-m-d H:i:s');
		$activity->save();
	}

	
}