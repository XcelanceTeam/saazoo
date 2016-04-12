<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_login".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $status
 * @property integer $user_role
 * @property string $register_type
 * @property string $profile_pic
 *
 * @property Advertisement[] $advertisements
 * @property BusinessMeta[] $businessMetas
 * @property CampaignDeductions[] $campaignDeductions
 * @property Payments[] $payments
 * @property ProductPost[] $productPosts
 * @property UserBalance $userBalance
 * @property UserCards[] $userCards
 * @property UserCompanyDetails $userCompanyDetails
 * @property UserKeys $userKeys
 * @property UserLinkdinDetails[] $userLinkdinDetails
 * @property UserLogging[] $userLoggings
 * @property UserRoles $userRole
 * @property UserPersonalDetails $userPersonalDetails
 * @property UserProductRatings[] $userProductRatings
 * @property UserProductReviews[] $userProductReviews
 * @property UserProductUsage[] $userProductUsages
 * @property UserSocialMedia[] $userSocialMedia
 */
class UserLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'status', 'user_role', 'register_type'], 'required'],
            [['status', 'user_role'], 'integer'],
            [['email'], 'string', 'max' => 150],
            [['password'], 'string', 'max' => 128],
            [['register_type'], 'string', 'max' => 15],
            [['profile_pic'], 'string', 'max' => 45],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'status' => '0: active | 1: inactive | 2: blocked',
            'user_role' => 'User Role',
            'register_type' => 'email | fb | linkedin | g+',
            'profile_pic' => 'Profile Pic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisements()
    {
        return $this->hasMany(Advertisement::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessMetas()
    {
        return $this->hasMany(BusinessMeta::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignDeductions()
    {
        return $this->hasMany(CampaignDeductions::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPosts()
    {
        return $this->hasMany(ProductPost::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBalance()
    {
        return $this->hasOne(UserBalance::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCards()
    {
        return $this->hasMany(UserCards::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanyDetails()
    {
        return $this->hasOne(UserCompanyDetails::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserKeys()
    {
        return $this->hasOne(UserKeys::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLinkdinDetails()
    {
        return $this->hasMany(UserLinkdinDetails::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLoggings()
    {
        return $this->hasMany(UserLogging::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole()
    {
        return $this->hasOne(UserRoles::className(), ['id' => 'user_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPersonalDetails()
    {
        return $this->hasOne(UserPersonalDetails::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductRatings()
    {
        return $this->hasMany(UserProductRatings::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductReviews()
    {
        return $this->hasMany(UserProductReviews::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductUsages()
    {
        return $this->hasMany(UserProductUsage::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSocialMedia()
    {
        return $this->hasMany(UserSocialMedia::className(), ['user_id' => 'id']);
    }
}
