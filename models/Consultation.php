<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultaion".
 *
 * @property integer $id
 * @property integer $doc_id
 * @property integer $patient_id
 * @property string $sign_n_symptoms
 * @property string $findings
 * @property string $treatment
 * @property string $next_date
 * @property integer $booking_id
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultaion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doc_id', 'patient_id', 'sign_n_symptoms', 'findings', 'treatment', 'booking_id'], 'required'],
            [['id', 'doc_id', 'patient_id', 'booking_id'], 'integer'],
            [['next_date'], 'safe'],
            [['sign_n_symptoms', 'findings', 'treatment'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'patient_id' => 'Patient ID',
            'sign_n_symptoms' => 'Sign and Symptoms',
            'findings' => 'Findings',
            'treatment' => 'Treatment',
            'next_date' => 'Next Date',
            'booking_id' => 'Booking ID',
        ];
    }
}
