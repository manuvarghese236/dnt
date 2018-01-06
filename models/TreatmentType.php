<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treatment_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $cost
 */
class TreatmentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name', 'cost'], 'required'],
            [['id'], 'integer'],
            [['cost'], 'number'],
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
            'cost' => 'Cost',
        ];
    }
}
