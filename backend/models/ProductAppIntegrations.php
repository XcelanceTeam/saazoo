<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_app_integrations".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $app_id
 *
 * @property AppIntegrations $app
 * @property Product $product
 */
class ProductAppIntegrations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_app_integrations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'app_id'], 'required'],
            [['product_id', 'app_id'], 'integer']
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
            'app_id' => 'App ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApp()
    {
        return $this->hasOne(AppIntegrations::className(), ['id' => 'app_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
