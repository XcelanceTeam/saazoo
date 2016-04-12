<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_admin_analysis".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $overview
 * @property string $what_is
 * @property string $main_features
 * @property string $integration
 * @property string $pricing
 * @property string $bottom_line
 *
 * @property Product $product
 */
class ProductAdminAnalysis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_admin_analysis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['overview', 'what_is', 'main_features', 'integration', 'pricing', 'bottom_line'], 'string']
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
            'overview' => 'Overview',
            'what_is' => 'What Is',
            'main_features' => 'Main Features',
            'integration' => 'Integration',
            'pricing' => 'Pricing',
            'bottom_line' => 'Bottom Line',
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
