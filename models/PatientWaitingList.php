<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property integer $id
 * @property integer $doctors_id
 * @property string $date
 * @property integer $patients_id
 * @property string $datetime_start
 * @property string $datetime_end
 * @property integer $status_id
 * @property string $diseases_description
 * @property string $time
 * @property integer $time_hour
 * @property integer $time_minute
 * @property integer $time_session
 */
class PatientWaitingList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctors_id', 'date', 'patients_id', 'datetime_start', 'datetime_end', 'status_id', 'diseases_description', 'time', 'time_hour', 'time_minute', 'time_session'], 'required'],
            [['doctors_id', 'patients_id', 'status_id', 'time_hour', 'time_minute', 'time_session'], 'integer'],
            [['date', 'datetime_start', 'datetime_end', 'time'], 'safe'],
            [['diseases_description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctors_id' => 'Doctors ID',
            'date' => 'Date',
            'patients_id' => 'Patients ID',
            'datetime_start' => 'Datetime Start',
            'datetime_end' => 'Datetime End',
            'status_id' => 'Status ID',
            'diseases_description' => 'Diseases Description',
            'time' => 'Time',
            'time_hour' => 'Time Hour',
            'time_minute' => 'Time Minute',
            'time_session' => 'Time Session',
        ];
    }
    
         public function getDoctor() {
        return $this->hasOne(Doctor::className(), ['id' => 'doctors_id']);
    }

    public function getTimeSession() {
        return $this->hasOne(TimeSession::className(), ['id' => 'time_session']);
    }

    public function getDaysession() {
        return $this->hasOne(Daysession::className(), ['id' => 'time_session']);
    }
    public function getPatient() {
        return $this->hasOne(Patient::className(), ['id' => 'patients_id']);
    }
    
    public function getBookingStatus() {
        return $this->hasOne(BookingStatus::className(), ['id' => 'status_id']);
    }
}
