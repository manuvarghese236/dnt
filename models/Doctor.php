<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property integer $email
 * @property integer $clinic_id
 * @property integer $specialization_id
 * @property string $qualification
 * @property integer $rating
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'email', 'clinic_id', 'specialization_id', 'qualification'], 'required'],
            [['clinic_id', 'specialization_id', 'rating'], 'integer'],
            [['name', 'mobile','email'], 'string', 'max' => 100],
            [['qualification'], 'string', 'max' => 50],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['specialization_id' => 'id']]
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
            'mobile' => 'Mobile',
            'email' => 'Email',
            'clinic_id' => 'Clinic ID',
            'specialization_id' => 'Specialization ID',
            'qualification' => 'Qualification',
            'rating' => 'Rating',
        ];
    }
    
    public function getSpecialization()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'specialization_id']);
    }
}