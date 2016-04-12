<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_video".
 *
 * @property string $id
 * @property string $product_id
 * @property string $url
 * @property integer $status
 *
 * @property Product $product
 */
class ProductVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'url'], 'required'],
            [['product_id', 'status'], 'integer'],
            [['url'], 'string', 'max' => 255]
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
            'url' => 'Url',
            'status' => '0: Published | 1: Unpublished ',
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
