<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_benefits".
 *
 * @property string $id
 * @property string $product_benefits_text
 * @property string $product_id
 *
 * @property Product $product
 */
class ProductBenefits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_benefits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_benefits_text', 'product_id'], 'required'],
            [['product_benefits_text'], 'string'],
            [['product_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_benefits_text' => 'Product Benefits Text',
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
