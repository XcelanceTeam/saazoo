<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_pricing".
 *
 * @property string $id
 * @property string $product_id
 * @property double $starting_price
 * @property string $price_recurring
 * @property string $description
 * @property integer $free_trial
 * @property string $pricing_plans_url
 *
 * @property Product $product
 */
class ProductPricing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_pricing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'free_trial'], 'integer'],
            [['starting_price'], 'number'],
            [['description', 'pricing_plans_url'], 'string'],
            [['price_recurring'], 'string', 'max' => 20],
            [['product_id'], 'unique']
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
            'starting_price' => 'Starting Price',
            'price_recurring' => 'Price Recurring',
            'description' => 'Description',
            'free_trial' => '0: Available (Credit Card) | 1: Available (No Credit Card Reqd) | 2: not available',
            'pricing_plans_url' => 'Pricing Plans Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
