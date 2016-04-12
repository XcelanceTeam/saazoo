<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_linkdin_details".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $user_company_size
 * @property integer $user_geographic_area
 * @property integer $user_business_industry
 * @property integer $user_organization_type
 * @property string $user_current_position
 * @property string $user_current_location
 * @property string $user_doj_company
 * @property string $user_description
 * @property string $user_expertise_area
 *
 * @property CompanySize $userCompanySize
 * @property GeographicAreas $userGeographicArea
 * @property BusinessIndustries $userBusinessIndustry
 * @property OrganizationType $userOrganizationType
 * @property UserLogin $user
 */
class UserLinkdinDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_linkdin_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_company_size', 'user_geographic_area', 'user_business_industry'], 'required'],
            [['user_id', 'user_company_size', 'user_geographic_area', 'user_business_industry', 'user_organization_type'], 'integer'],
            [['user_doj_company'], 'safe'],
            [['user_description', 'user_expertise_area'], 'string'],
            [['user_current_position', 'user_current_location'], 'string', 'max' => 60]
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
            'user_company_size' => 'User Company Size',
            'user_geographic_area' => 'User Geographic Area',
            'user_business_industry' => 'User Business Industry',
            'user_organization_type' => 'User Organization Type',
            'user_current_position' => 'User Current Position',
            'user_current_location' => 'User Current Location',
            'user_doj_company' => 'User Doj Company',
            'user_description' => 'User Description',
            'user_expertise_area' => 'User Expertise Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanySize()
    {
        return $this->hasOne(CompanySize::className(), ['id' => 'user_company_size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGeographicArea()
    {
        return $this->hasOne(GeographicAreas::className(), ['id' => 'user_geographic_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBusinessIndustry()
    {
        return $this->hasOne(BusinessIndustries::className(), ['id' => 'user_business_industry']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrganizationType()
    {
        return $this->hasOne(OrganizationType::className(), ['id' => 'user_organization_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
