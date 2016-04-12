<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_product_key_features_relations".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $product_key_features_id
 *
 * @property Product $product
 * @property ProductKeyFeatures $productKeyFeatures
 */
class ProductProductKeyFeaturesRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_product_key_features_relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_key_features_id'], 'required'],
            [['product_id', 'product_key_features_id'], 'integer']
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
            'product_key_features_id' => 'Product Key Features ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductKeyFeatures()
    {
        return $this->hasOne(ProductKeyFeatures::className(), ['id' => 'product_key_features_id']);
    }
}
