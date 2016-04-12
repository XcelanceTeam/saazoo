<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_meta".
 *
 * @property string $id
 * @property string $product_id
 * @property string $description
 * @property string $who_is_for
 * @property string $supported_languages
 * @property string $support_options
 *
 * @property Product $product
 */
class ProductMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['description', 'who_is_for', 'supported_languages', 'support_options'], 'string']
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
            'description' => 'Description',
            'who_is_for' => 'Who Is For',
            'supported_languages' => 'Supported Languages',
            'support_options' => 'Support Options',
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
