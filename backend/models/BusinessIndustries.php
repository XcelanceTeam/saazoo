<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_industries".
 *
 * @property integer $id
 * @property string $industry_name
 * @property string $description
 * @property integer $status
 *
 * @property UserCompanyDetails[] $userCompanyDetails
 * @property UserLinkdinDetails[] $userLinkdinDetails
 * @property UserPersonalDetails[] $userPersonalDetails
 */
class BusinessIndustries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_industries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['industry_name', 'status'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['industry_name'], 'string', 'max' => 150],
            [['industry_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'industry_name' => 'Industry Name',
            'description' => 'Description',
            'status' => '0: active | 1:inactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasMany(UserCompanyDetails::className(), ['industry_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLinkdinDetails()
    {
        return $this->hasMany(UserLinkdinDetails::className(), ['user_business_industry' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPersonalDetails()
    {
        return $this->hasMany(UserPersonalDetails::className(), ['industry_type' => 'id']);
    }
}
