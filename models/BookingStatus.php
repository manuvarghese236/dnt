<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking_status".
 *
 * @property integer $id
 * @property string $name
 */
class BookingStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Booking Status',
        ];
    }
}
