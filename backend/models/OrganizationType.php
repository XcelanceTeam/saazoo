<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization_type".
 *
 * @property integer $id
 * @property string $type_of_organization
 * @property integer $status
 *
 * @property ProductOrganizationType[] $productOrganizationTypes
 * @property UserCompanyDetails[] $userCompanyDetails
 * @property UserLinkdinDetails[] $userLinkdinDetails
 */
class OrganizationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_of_organization'], 'required'],
            [['status'], 'integer'],
            [['type_of_organization'], 'string', 'max' => 60],
            [['type_of_organization'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_of_organization' => 'Type Of Organization',
            'status' => '0: active | 1:inactive
',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrganizationTypes()
    {
        return $this->hasMany(ProductOrganizationType::className(), ['organization_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasMany(UserCompanyDetails::className(), ['org_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLinkdinDetails()
    {
        return $this->hasMany(UserLinkdinDetails::className(), ['user_organization_type' => 'id']);
    }
}
