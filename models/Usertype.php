<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertypes".
 *
 * @property integer $ID
 * @property string $Name
 * @property integer $status
 *
 * @property Users[] $users
 */
class Usertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'status'], 'required'],
            [['status'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['Name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'User Type',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['UserTypeID' => 'ID']);
    }
}
