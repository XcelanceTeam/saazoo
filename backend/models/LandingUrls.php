<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landing_urls".
 *
 * @property string $id
 * @property string $product_id
 * @property string $application_url
 * @property string $benifits
 * @property string $demo
 * @property string $features
 * @property string $pricing
 * @property string $tour
 *
 * @property Product $product
 */
class LandingUrls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing_urls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id'], 'required'],
            [['id', 'product_id'], 'integer'],
            [['application_url', 'benifits', 'demo', 'features', 'pricing', 'tour'], 'string', 'max' => 250]
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
            'application_url' => 'Application Url',
            'benifits' => 'Benifits',
            'demo' => 'Demo',
            'features' => 'Features',
            'pricing' => 'Pricing',
            'tour' => 'Tour',
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
