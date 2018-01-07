<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedurelists".
 *
 * @property integer $id
 * @property integer $treatment_type_id
 * @property integer $qty
 * @property string $rate
 * @property string $amount
 * @property integer $consult_id
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property string $Notes
 */
class Procedurelist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procedurelists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['treatment_type_id', 'qty', 'rate', 'amount', 'consult_id', 'patient_id', 'doctor_id'], 'required'],
            [['treatment_type_id', 'qty', 'consult_id', 'patient_id', 'doctor_id'], 'integer'],
            [['rate', 'amount'], 'number'],
            [['Notes'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'treatment_type_id' => 'Treatment Type ID',
            'qty' => 'Qty',
            'rate' => 'Rate',
            'amount' => 'Amount',
            'consult_id' => 'Consult ID',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'Notes' => 'Notes',
        ];
    }
}
