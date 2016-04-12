<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_company_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $company_name
 * @property string $company_address
 * @property string $company_contact
 * @property string $contact_person
 * @property string $company_description
 * @property string $company_logo
 * @property integer $business_sub_category
 * @property integer $business_category
 * @property integer $company_size
 * @property integer $industry_type
 * @property integer $org_type
 * @property integer $status
 * @property string $company_website
 * @property string $contact_person_job_title
 *
 * @property BusinessMeta[] $businessMetas
 * @property Product[] $products
 * @property BusinessCategories $businessCategory
 * @property CompanySize $companySize
 * @property BusinessIndustries $industryType
 * @property OrganizationType $orgType
 * @property BusinessSubCategories $businessSubCategory
 * @property UserLogin $user
 */
class UserCompanyDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_company_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'business_sub_category', 'business_category', 'company_size', 'industry_type', 'org_type', 'status'], 'required'],
            [['user_id', 'business_sub_category', 'business_category', 'company_size', 'industry_type', 'org_type', 'status'], 'integer'],
            [['company_address', 'company_description'], 'string'],
            [['company_name'], 'string', 'max' => 45],
            [['company_contact'], 'string', 'max' => 30],
            [['contact_person'], 'string', 'max' => 50],
            [['company_logo'], 'string', 'max' => 250],
            [['company_website'], 'string', 'max' => 60],
            [['contact_person_job_title'], 'string', 'max' => 200],
            [['user_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_name' => 'Company Name',
            'company_address' => 'Company Address',
            'company_contact' => 'Company Contact',
            'contact_person' => 'Contact Person',
            'company_description' => 'Company Description',
            'company_logo' => 'Company Logo',
            'business_sub_category' => 'Business Sub Category',
            'business_category' => 'Business Category',
            'company_size' => 'Company Size',
            'industry_type' => 'Industry Type',
            'org_type' => 'Org Type',
            'status' => '0: active | 1: inactive | 2: blocked | 3: deleted',
            'company_website' => 'Company Website',
            'contact_person_job_title' => 'Contact Person Job Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessMetas()
    {
        return $this->hasMany(BusinessMeta::className(), ['user_company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCategory()
    {
        return $this->hasOne(BusinessCategories::className(), ['id' => 'business_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanySize()
    {
        return $this->hasOne(CompanySize::className(), ['id' => 'company_size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryType()
    {
        return $this->hasOne(BusinessIndustries::className(), ['id' => 'industry_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgType()
    {
        return $this->hasOne(OrganizationType::className(), ['id' => 'org_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessSubCategory()
    {
        return $this->hasOne(BusinessSubCategories::className(), ['id' => 'business_sub_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
