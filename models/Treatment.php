<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $doc_id
 * @property integer $patient_id
 * @property string $notes
 * @property string $cost
 * @property string $dicsount
  * @property integer $status
  * @property string $date
 */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'doc_id', 'patient_id', 'cost', 'dicsount'], 'required'],
            [['type_id', 'doc_id', 'patient_id','status'], 'integer'],
            [['cost', 'dicsount'], 'number'],
            [['notes'], 'string', 'max' => 300],
            [['date'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Treatment Type',
            'doc_id' => 'Doctor',
            'patient_id' => 'Patient',
            'notes' => 'Notes',
            'cost' => 'Cost',
            'dicsount' => 'Dicsount',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
    public function getTreatmentType()
    {
        return $this->hasOne(TreatmentType::className(), ['id' => 'type_id']);
    }
     public function getPatient() {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }
    public function getDoctor() {
        return $this->hasOne(Doctor::className(), ['id' => 'doc_id']);
    }
     public function getTreatmentStatus()
    {
        return $this->hasOne(TreatmentStatus::className(), ['id' => 'status']);
    }
}
