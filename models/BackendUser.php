<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backend_user".
 *
 * @property integer $ID
 * @property string $Username
 * @property string $Password
 * @property integer $UserTypeID
 * @property integer $Status
 * @property integer $MasterID
 * @property string authKey
 * @property Usertypes $userType
 */
class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    /**
     * @inheritdoc
     */
    
    
    public static function tableName()
    {
        return 'backend_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Username', 'Password', 'UserTypeID', 'Status'], 'required'],
            [['UserTypeID', 'Status', 'MasterID'], 'integer'],
            [['Username', 'Password','authKey'], 'string', 'max' => 100],
            [['Username'], 'unique'],
            [['UserTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => Usertype::className(), 'targetAttribute' => ['UserTypeID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Username' => 'Username',
            'Password' => 'Password',
            'UserTypeID' => 'User Type',
            'Status' => 'Status',
            'MasterID' => 'Master ID',
            'authKey'=>'authKey',
             'patient_id'=>'Patient',
            'admin_id'=>'Admin',
            'doctor_id'=>'Doctor',
            'recep_id'=>'Recptionist'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
    public function getUserType()
    {
        return $this->hasOne(Usertype::className(), ['ID' => 'UserTypeID']);
    }
    
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }
    
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    public function getAuthKey() {
        
        return $this->authKey;
    }

    public function getId() {
        return $this->ID;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey==$authKey;
    }

    public static function findIdentity($id) {
      return  self::findOne($id);   
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();
    }
    public static function findByUsername($username) {
        return self::findOne([
            "Username"=>$username, 'Status'=>1
                ]);
    }
    public function validatePassword($password) {
        return $this->Password==$password;
        
    }
}
