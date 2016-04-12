<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property string $id
 * @property integer $user_id
 * @property double $payment_amount
 * @property string $payment_date
 * @property string $comments
 * @property string $status
 *
 * @property UserLogin $user
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'payment_amount', 'payment_date', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['payment_amount'], 'number'],
            [['payment_date'], 'safe'],
            [['comments'], 'string'],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'payment_amount' => 'Payment Amount',
            'payment_date' => 'Payment Date',
            'comments' => 'Comments',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
