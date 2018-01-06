<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $Sex
 *
 * @property Sex $sex
 */
class patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'address', 'Sex'], 'required'],
            [['email'],'email'],
            [['phone'], 'string','length'=>[10,10]],
            [['Sex'], 'integer'],
            [['name', 'phone', 'email'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 300],
            [['Sex'], 'exist', 'skipOnError' => true, 'targetClass' => Sex::className(), 'targetAttribute' => ['Sex' => 'id']],
            [['blood_group'], 'exist', 'skipOnError' => true, 'targetClass' => BloodGroup::className(), 'targetAttribute' => ['blood_group' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'Sex' => 'Sex',
            'dob'=>'Date of Brith',
            'blood_group'=>'Blood Group'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::className(), ['id' => 'Sex']);
    }
    
      /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloodGroup()
    {
        return $this->hasOne(BloodGroup::className(), ['id' => 'blood_group']);
    }
}
