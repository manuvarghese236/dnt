<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blood_group".
 *
 * @property integer $id
 * @property string $name
 */
class BloodGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blood_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Blood Group',
        ];
    }
}
