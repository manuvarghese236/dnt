<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosage".
 *
 * @property integer $id
 * @property string $name
 * @property integer $medicine_id
 */
class Dosage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'medicine_id'], 'required'],
            [['medicine_id'], 'integer'],
            [['name'], 'integer'],
            [['unit'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Dose',
            'medicine_id' => 'Medicine',
            'unit' => 'Unit',
        ];
    }
    
    public function getMedicines(){
        return $this->hasOne(Medicines::className(), ['id' => 'medicine_id']);
    }
}
