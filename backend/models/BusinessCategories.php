<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_categories".
 *
 * @property integer $id
 * @property string $category_name
 * @property string $description
 * @property integer $status
 * @property string $icon
 *
 * @property BusinessSubCategories[] $businessSubCategories
 * @property Product[] $products
 * @property UserCompanyDetails[] $userCompanyDetails
 */
class BusinessCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'status'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['category_name'], 'string', 'max' => 150],
            [['icon'], 'string', 'max' => 45],
            [['category_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'status' => '0: active | 1: inactive',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessSubCategories()
    {
        return $this->hasMany(BusinessSubCategories::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasMany(UserCompanyDetails::className(), ['business_category' => 'id']);
    }
}
