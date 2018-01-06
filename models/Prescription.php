<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prescription".
 *
 * @property integer $id
 * @property integer $medicine_id
 * @property integer $doc_id
 * @property integer $dosage_id
 * @property string $freequency
 * @property string $duration
 * @property integer $nos
 * @property string $notes
 */
class Prescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prescription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicine_id', 'doc_id', 'dosage_id', 'freequency', 'duration', 'nos','date','patient_id'], 'required'],
            [['medicine_id', 'doc_id', 'dosage_id', 'nos'], 'integer'],
            [['freequency', 'duration'], 'string', 'max' => 100],
            [['notes'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'medicine_id' => 'Medicine',
            'doc_id' => 'Doctor',
            'dosage_id' => 'Dosage',
            'freequency' => 'Freequency',
            'duration' => 'Duration',
            'nos' => 'Nos',
            'notes' => 'Notes',
            'patient_id' => 'Patient',
        ];
    }
      public function getMedicines(){
        return $this->hasOne(Medicines::className(), ['id' => 'medicine_id']);
    }
    
    public function getDoctor() {
        return $this->hasOne(Doctor::className(), ['id' => 'doc_id']);
    }
    
    public function getDosage() {
        return $this->hasOne(Dosage::className(), ['id' => 'dosage_id']);
    }
    
    public function getPatient() {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }
}
