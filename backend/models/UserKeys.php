<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_keys".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $access_token
 * @property string $secret_key
 * @property string $refer_code
 *
 * @property UserLogin $user
 */
class UserKeys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_keys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'access_token', 'secret_key', 'refer_code'], 'required'],
            [['user_id'], 'integer'],
            [['access_token', 'secret_key'], 'string', 'max' => 150],
            [['refer_code'], 'string', 'max' => 10],
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
            'access_token' => 'Access Token',
            'secret_key' => 'Secret Key',
            'refer_code' => 'Refer Code',
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
