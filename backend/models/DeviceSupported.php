<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device_supported".
 *
 * @property integer $id
 * @property string $device_name
 *
 * @property ProductDeviceSupported[] $productDeviceSupporteds
 */
class DeviceSupported extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_supported';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['device_name'], 'required'],
            [['device_name'], 'string', 'max' => 45],
            [['device_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'device_name' => 'Device Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDeviceSupporteds()
    {
        return $this->hasMany(ProductDeviceSupported::className(), ['device_id' => 'id']);
    }
}
