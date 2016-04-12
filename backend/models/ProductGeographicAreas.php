<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_geographic_areas".
 *
 * @property string $id
 * @property string $product_id
 * @property integer $geographic_id
 *
 * @property GeographicAreas $geographic
 * @property Product $product
 */
class ProductGeographicAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_geographic_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'geographic_id'], 'required'],
            [['product_id', 'geographic_id'], 'integer']
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
            'geographic_id' => 'Geographic ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeographic()
    {
        return $this->hasOne(GeographicAreas::className(), ['id' => 'geographic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
