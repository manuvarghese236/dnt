<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "availability".
 *
 * @property integer $ID
 * @property integer $Doc_id
 * @property integer $d1
 * @property integer $s1
 * @property integer $d2
 * @property integer $s2
 * @property integer $d3
 * @property integer $s3
 * @property integer $d4
 * @property integer $s4
 * @property integer $d5
 * @property integer $s5
 * @property integer $d6
 * @property integer $s6
 * @property integer $d7
 * @property integer $s7
 * @property integer $dall
 * @property integer $sall
 *
 * @property Doctor $doc
 */
class Availability extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'availability';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Doc_id', 'd1', 's1', 'd2', 's2', 'd3', 's3', 'd4', 's4', 'd5', 's5', 'd6', 's6', 'd7', 's7', 'dall', 'sall'], 'required'],
            [['Doc_id', 'd1', 's1', 'd2', 's2', 'd3', 's3', 'd4', 's4', 'd5', 's5', 'd6', 's6', 'd7', 's7', 'dall', 'sall'], 'integer'],
            [['Doc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['Doc_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'Doc_id' => 'Doc ID',
            'd1' => 'Sunday',
            's1' => 'Sunday Session',
            'd2' => 'Monday',
            's2' => 'Monday Session',
            'd3' => 'Tuesday',
            's3' => 'Tuesday Session',
            'd4' => 'Wednesday',
            's4' => 'Wednesday Session',
            'd5' => 'Thursday',
            's5' => 'Thursday Session',
            'd6' => 'Friday',
            's6' => 'Friday Session',
            'd7' => 'Saturday',
            's7' => 'Saturday Session',
            'dall' => 'All Days (Expect holyday)',
            'sall' => 'All Session',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoc() {
        return $this->hasOne(Doctor::className(), ['id' => 'Doc_id']);
    }

    public function getS1() {
        return $this->hasOne(Daysession::className(), ['id' => 's1']);
    }

    public function getS2() {
        return $this->hasOne(Daysession::className(), ['id' => 's2']);
    }

    public function getS3() {
        return $this->hasOne(Daysession::className(), ['id' => 's3']);
    }

    public function getS4() {
        return $this->hasOne(Daysession::className(), ['id' => 's4']);
    }

    public function getS5() {
        return $this->hasOne(Daysession::className(), ['id' => 's5']);
    }

    public function getS6() {
        return $this->hasOne(Daysession::className(), ['id' => 's6']);
    }

    public function getS7() {
        return $this->hasOne(Daysession::className(), ['id' => 's7']);
    }

}
