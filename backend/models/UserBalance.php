<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_balance".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $account_balance
 * @property double $monthly_limit
 *
 * @property UserLogin $user
 */
class UserBalance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_balance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['account_balance', 'monthly_limit'], 'number'],
            [['user_id'], 'unique']
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
            'account_balance' => 'Account Balance',
            'monthly_limit' => '0 means, no limit and admin can deduct as much amount as per the redirections or clicks.',
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
