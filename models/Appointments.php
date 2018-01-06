<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointments".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $date_time
 */
class Appointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'date_time'], 'required'],
            [['date_time'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
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
            'email' => 'Email',
            'date_time' => 'Date Time',
        ];
    }
}
