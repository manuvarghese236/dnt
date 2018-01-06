<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property integer $id
 * @property string $bill_no
 * @property string $date
 * @property string $amount
 * @property integer $status
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bill_no', 'date', 'amount', 'status'], 'required'],
            [['date'], 'safe'],
            [['amount'], 'number'],
            [['status'], 'integer'],
            [['bill_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bill_no' => 'Bill No',
            'date' => 'Date',
            'amount' => 'Amount',
            'status' => 'Status',
        ];
    }
    public function getBillStatus()
    {
        return $this->hasOne(BillStatus::className(), ['id' => 'status']);
    }
}
