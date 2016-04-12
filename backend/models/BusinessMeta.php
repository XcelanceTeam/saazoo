<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_meta".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $user_company_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $telephone
 * @property string $company_legal_name
 * @property string $billing_address
 * @property string $vat_number
 *
 * @property UserCompanyDetails $userCompany
 * @property UserLogin $user
 */
class BusinessMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_company_id'], 'required'],
            [['id', 'user_id', 'user_company_id'], 'integer'],
            [['billing_address'], 'string'],
            [['first_name', 'last_name', 'vat_number'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 150],
            [['telephone'], 'string', 'max' => 15],
            [['company_legal_name'], 'string', 'max' => 45]
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
            'user_company_id' => 'User Company ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'company_legal_name' => 'Company Legal Name',
            'billing_address' => 'Billing Address',
            'vat_number' => 'Vat Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompany()
    {
        return $this->hasOne(UserCompanyDetails::className(), ['id' => 'user_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserLogin::className(), ['id' => 'user_id']);
    }
}
