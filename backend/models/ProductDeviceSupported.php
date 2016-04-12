<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_device_supported".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $device_id
 *
 * @property DeviceSupported $device
 * @property Product $product
 */
class ProductDeviceSupported extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_device_supported';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'device_id'], 'required'],
            [['product_id', 'device_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'device_id' => 'Device ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevice()
    {
        return $this->hasOne(DeviceSupported::className(), ['id' => 'device_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
