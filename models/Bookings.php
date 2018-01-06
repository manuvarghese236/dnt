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
 */
class Bookings extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'bookings';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['doctors_id', 'patients_id' ,'date', 'time_hour', 'time_minute', 'time_session'], 'required'],
            [['doctors_id', 'patients_id', 'status_id'], 'integer'],
            [['date', 'datetime_start', 'datetime_end'], 'safe'],
            [['diseases_description'], 'string'],
            [['date'], 'dayCheck'],
            [['time_session'], 'sessionCheck'],
        ];
    }

    public function dayCheck() {
//                             $this->addError('date','Doctor is not Available');

        $doc_id = $this->doctors_id;
        $book_date = $this->date;

        $query = Availability::find()->where(['Doc_id' => $doc_id])->one();

        $test = 0;
        $session = 0;
        switch (date('l', strtotime($book_date))) {
            case "Sunday": if ($query->d1 == 1) {
                    $test = 1;
                    $session = $query->s1;
                }
                break;
            case "Monday": if ($query->d2 == 1) {
                    $test = 1;
                    $session = $query->s2;
                }
                break;
            case "Wednesday": if ($query->d4 == 1) {
                    $test = 1;
                    $session = $query->s4;
                }
                break;
            case "Tuesday": if ($query->d3 == 1) {
                    $test = 1;
                    $session = $query->s3;
                }
                break;
            case "Thursday": if ($query->d5 == 1) {
                    $test = 1;
                    $session = $query->s5;
                }
                break;
            case "Friday": if ($query->d6 == 1) {
                    $test = 1;
                    $session = $query->s6;
                }
                break;
            case "Saturday": if ($query->d7 == 1) {
                    $test = 1;
                    $session = $query->s7;
                }
                break;
        }
        
        if ($query->dall == 1){
                $test = 1;
            }
//            echo 'sess: ' . $session;
//            echo 'day: ' . $test;
//            die();

        if ($test != 1) {
            $this->addError('date', 'Doctor is not Available');
//            echo 'error';
//            die();
        }
//      }
    }

    public function sessionCheck() {

        $doc_id = $this->doctors_id;
        $book_date = $this->date;
        $time_session = $this->time_session;

        $query = Availability::find()->where(['Doc_id' => $doc_id])->one();

        $test = 0;
        $session = 0;
        switch (date('l', strtotime($book_date))) {
            case "Sunday": if ($query->d1 == 1) {
                    $test = 1;
                    $session = $query->s1;
                }
                break;
            case "Monday": if ($query->d2 == 1) {
                    $test = 1;
                    $session = $query->s2;
                }
                break;
            case "Wednesday": if ($query->d4 == 1) {
                    $test = 1;
                    $session = $query->s4;
                }
                break;
            case "Tuesday": if ($query->d3 == 1) {
                    $test = 1;
                    $session = $query->s3;
                }
                break;
            case "Thursday": if ($query->d5 == 1) {
                    $test = 1;
                    $session = $query->s5;
                }
                break;
            case "Friday": if ($query->d6 == 1) {
                    $test = 1;
                    $session = $query->s6;
                }
                break;
            case "Saturday": if ($query->d7 == 1) {
                    $test = 1;
                    $session = $query->s7;
                }
                break;
        }

        if ($session != 1) {
            if ($session != $time_session) {
                
                if ($session == 2) {
                    $this->addError('time_session', 'Sorry Only available at Morning Session');
                } elseif ($session == 3) {
                    $this->addError('time_session', 'Sorry Only available at Evening Session');
                }
            }
        }
//      
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'doctors_id' => 'Doctor',
            'date' => 'Date',
            'patients_id' => 'Patient',
            'datetime_start' => 'Datetime Start',
            'datetime_end' => 'Datetime End',
            'status_id' => 'Status',
            'diseases_description' => 'Reason',
            'time_hour' => 'Hour',
            'time_minute' => 'Minute',
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
