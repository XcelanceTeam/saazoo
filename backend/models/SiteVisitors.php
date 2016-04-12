<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_visitors".
 *
 * @property string $id
 * @property string $ip_address
 * @property string $visit_timestamp
 */
class SiteVisitors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_visitors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip_address', 'visit_timestamp'], 'required'],
            [['visit_timestamp'], 'safe'],
            [['ip_address'], 'string', 'max' => 60]
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
            'visit_timestamp' => 'Visit Timestamp',
        ];
    }
}
