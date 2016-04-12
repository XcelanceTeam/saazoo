<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_sub_categories".
 *
 * @property integer $id
 * @property string $sub_category_name
 * @property integer $category_id
 * @property string $description
 * @property integer $status
 * @property string $icon
 *
 * @property BusinessCategories $category
 * @property UserCompanyDetails[] $userCompanyDetails
 */
class BusinessSubCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_sub_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_category_name', 'category_id', 'status'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['sub_category_name'], 'string', 'max' => 150],
            [['icon'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sub_category_name' => 'Sub Category Name',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'status' => '0:active | 1: inactive',
            'icon' => 'Icon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BusinessCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasMany(UserCompanyDetails::className(), ['business_sub_category' => 'id']);
    }
}
