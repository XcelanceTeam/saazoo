<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_key_features".
 *
 * @property integer $id
 * @property string $product_key_features_name
 * @property integer $product_key_feature_status
 *
 * @property ProductProductKeyFeaturesRelations[] $productProductKeyFeaturesRelations
 */
class ProductKeyFeatures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_key_features';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_key_features_name', 'product_key_feature_status'], 'required'],
            [['product_key_feature_status'], 'integer'],
            [['product_key_features_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_key_features_name' => 'Product Key Features Name',
            'product_key_feature_status' => '0: Active | 1: Inactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProductKeyFeaturesRelations()
    {
        return $this->hasMany(ProductProductKeyFeaturesRelations::className(), ['product_key_features_id' => 'id']);
    }
}
