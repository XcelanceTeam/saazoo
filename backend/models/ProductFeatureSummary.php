<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_feature_summary".
 *
 * @property string $id
 * @property string $product_id
 * @property string $product_feature_summary_text
 *
 * @property Product $product
 */
class ProductFeatureSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_feature_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_feature_summary_text'], 'required'],
            [['product_id'], 'integer'],
            [['product_feature_summary_text'], 'string'],
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
            'product_feature_summary_text' => 'Product Feature Summary Text',
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
