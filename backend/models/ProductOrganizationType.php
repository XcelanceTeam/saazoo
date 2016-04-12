<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_organization_type".
 *
 * @property integer $id
 * @property string $product_id
 * @property integer $organization_type_id
 *
 * @property OrganizationType $organizationType
 * @property Product $product
 */
class ProductOrganizationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_organization_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'organization_type_id'], 'required'],
            [['product_id', 'organization_type_id'], 'integer']
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
            'organization_type_id' => 'Organization Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationType()
    {
        return $this->hasOne(OrganizationType::className(), ['id' => 'organization_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
