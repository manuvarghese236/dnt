<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicines".
 *
 * @property integer $id
 * @property string $name
 */
class Medicines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
        ];
    }
    
      public function getMedicine()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'medicine_id']);
    }
}
