<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_cards".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $card_number
 * @property integer $expiry_month
 * @property integer $verified
 * @property integer $expiry_year
 *
 * @property UserLogin $user
 */
class UserCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id', 'expiry_month', 'verified', 'expiry_year'], 'integer'],
            [['card_number'], 'string', 'max' => 25]
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
            'card_number' => 'Card Number',
            'expiry_month' => 'Expiry Month',
            'verified' => '0: varified | 1: not-verified',
            'expiry_year' => 'Expiry Year',
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
