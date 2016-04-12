<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_screenshots".
 *
 * @property string $id
 * @property string $product_id
 * @property string $screenshot_url
 *
 * @property Product $product
 */
class ProductScreenshots extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_screenshots';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'screenshot_url'], 'required'],
            [['product_id'], 'integer'],
            [['screenshot_url'], 'string']
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
            'screenshot_url' => 'Screenshot Url',
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
