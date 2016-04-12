<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_logging".
 *
 * @property string $id
 * @property string $ip_address
 * @property string $url_visited
 * @property string $visit_timestamp
 * @property string $app_id
 * @property integer $user_id
 * @property string $activity
 *
 * @property UserLogin $user
 */
class UserLogging extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_logging';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip_address', 'url_visited', 'visit_timestamp', 'user_id'], 'required'],
            [['url_visited', 'activity'], 'string'],
            [['visit_timestamp'], 'safe'],
            [['user_id'], 'integer'],
            [['ip_address'], 'string', 'max' => 60],
            [['app_id'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip_address' => 'Ip Address',
            'url_visited' => 'Url Visited',
            'visit_timestamp' => 'Visit Timestamp',
            'app_id' => 'App ID',
            'user_id' => 'User ID',
            'activity' => 'Activity',
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
