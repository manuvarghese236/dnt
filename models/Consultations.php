<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultations".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $doctor_Id
 * @property string $Date
 * @property integer $session_id
 * @property integer $booking_id
 * @property string $findings
 * @property string $notes
 * @property string $Amount
 */
class Consultations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_Id', 'Date', 'session_id', 'booking_id', 'findings', 'notes', 'Amount'], 'required'],
            [['patient_id', 'doctor_Id', 'session_id', 'booking_id'], 'integer'],
            [['Date'], 'safe'],
            [['Amount'], 'number'],
            [['findings', 'notes'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient',
            'doctor_Id' => 'Doctor',
            'Date' => 'Date',
            'session_id' => 'Session',
            'booking_id' => 'Booking',
            'findings' => 'Findings',
            'notes' => 'Notes',
            'Amount' => 'Amount',
        ];
    }
}
