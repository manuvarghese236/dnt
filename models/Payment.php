<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property string $payment_no
 * @property string $date
 * @property integer $status
 * @property integer $bill_id
 * @property integer $amount
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bill_id','amount'], 'required'],
            [['id', 'status', 'bill_id'], 'integer'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['payment_no'], 'string', 'max' => 300],
            [['remarks'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_no' => 'Payment No',
            'date' => 'Date',
            'status' => 'Status',
            'bill_id' => 'Bill ID',
            'amount' => 'Amount',
            'remarks' => 'Remarks',
        ];
    }
}
