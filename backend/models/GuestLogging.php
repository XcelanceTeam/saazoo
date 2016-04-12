<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guest_logging".
 *
 * @property string $id
 * @property string $ip_address
 * @property string $url_visited
 * @property string $visit_timestamp
 * @property string $app_id
 * @property string $activity
 */
class GuestLogging extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest_logging';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip_address', 'url_visited', 'visit_timestamp'], 'required'],
            [['url_visited', 'activity'], 'string'],
            [['visit_timestamp'], 'safe'],
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
            'activity' => 'Activity',
        ];
    }
}
