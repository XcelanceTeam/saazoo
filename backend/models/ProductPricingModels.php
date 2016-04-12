<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_pricing_models".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $pricing_model_id
 *
 * @property PricingModels $pricingModel
 * @property Product $product
 */
class ProductPricingModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_pricing_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'pricing_model_id'], 'required'],
            [['product_id', 'pricing_model_id'], 'integer']
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
            'pricing_model_id' => 'Pricing Model ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricingModel()
    {
        return $this->hasOne(PricingModels::className(), ['id' => 'pricing_model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
