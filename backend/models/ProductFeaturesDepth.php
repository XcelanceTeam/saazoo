<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_features_depth".
 *
 * @property string $id
 * @property string $features_in_depth
 * @property string $product_id
 *
 * @property Product $product
 */
class ProductFeaturesDepth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_features_depth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['features_in_depth', 'product_id'], 'required'],
            [['features_in_depth'], 'string'],
            [['product_id'], 'integer'],
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
            'features_in_depth' => 'Features In Depth',
            'product_id' => 'Product ID',
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
