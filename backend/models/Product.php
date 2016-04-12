<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $product_name
 * @property integer $category_id
 * @property string $sub_category_ids
 * @property string $product_image
 * @property integer $company_id
 * @property string $added_on
 * @property integer $status
 * @property integer $rank
 * @property string $app_url
 *
 * @property Advertisement[] $advertisements
 * @property CampaignDeductions[] $campaignDeductions
 * @property LandingUrls[] $landingUrls
 * @property BusinessCategories $category
 * @property UserCompanyDetails $company
 * @property ProductAdminAnalysis[] $productAdminAnalyses
 * @property ProductAppIntegrations[] $productAppIntegrations
 * @property ProductBenefits[] $productBenefits
 * @property ProductDeviceSupported[] $productDeviceSupporteds
 * @property ProductFaqAnswers[] $productFaqAnswers
 * @property ProductFeatureSummary $productFeatureSummary
 * @property ProductFeaturesDepth $productFeaturesDepth
 * @property ProductGeographicAreas[] $productGeographicAreas
 * @property ProductMeta[] $productMetas
 * @property ProductOrganizationType[] $productOrganizationTypes
 * @property ProductPost[] $productPosts
 * @property ProductPricing $productPricing
 * @property ProductPricingModels[] $productPricingModels
 * @property ProductProductKeyFeaturesRelations[] $productProductKeyFeaturesRelations
 * @property ProductScreenshots[] $productScreenshots
 * @property ProductVideo[] $productVideos
 * @property UserProductRatings[] $userProductRatings
 * @property UserProductReviews[] $userProductReviews
 * @property UserProductUsage[] $userProductUsages
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'category_id', 'sub_category_ids', 'company_id', 'added_on', 'status', 'app_url'], 'required'],
            [['category_id', 'company_id', 'status', 'rank'], 'integer'],
            [['sub_category_ids'], 'string'],
            [['added_on'], 'safe'],
            [['product_name'], 'string', 'max' => 150],
            [['product_image', 'app_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'category_id' => 'Category ID',
            'sub_category_ids' => 'Sub Category Ids',
            'product_image' => 'Product Image',
            'company_id' => 'Company ID',
            'added_on' => 'Added On',
            'status' => '0:active | 1: inactive | 2: blocked | 3: deleted',
            'rank' => 'for dispalying the product on home page. default: 0: not paid ',
            'app_url' => 'App Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertisements()
    {
        return $this->hasMany(Advertisement::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignDeductions()
    {
        return $this->hasMany(CampaignDeductions::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLandingUrls()
    {
        return $this->hasMany(LandingUrls::className(), ['product_id' => 'id']);
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
    public function getCompany()
    {
        return $this->hasOne(UserCompanyDetails::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAdminAnalyses()
    {
        return $this->hasMany(ProductAdminAnalysis::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAppIntegrations()
    {
        return $this->hasMany(ProductAppIntegrations::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductBenefits()
    {
        return $this->hasMany(ProductBenefits::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDeviceSupporteds()
    {
        return $this->hasMany(ProductDeviceSupported::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductFaqAnswers()
    {
        return $this->hasMany(ProductFaqAnswers::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductFeatureSummary()
    {
        return $this->hasOne(ProductFeatureSummary::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductFeaturesDepth()
    {
        return $this->hasOne(ProductFeaturesDepth::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGeographicAreas()
    {
        return $this->hasMany(ProductGeographicAreas::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductMetas()
    {
        return $this->hasMany(ProductMeta::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOrganizationTypes()
    {
        return $this->hasMany(ProductOrganizationType::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPosts()
    {
        return $this->hasMany(ProductPost::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricing()
    {
        return $this->hasOne(ProductPricing::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricingModels()
    {
        return $this->hasMany(ProductPricingModels::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProductKeyFeaturesRelations()
    {
        return $this->hasMany(ProductProductKeyFeaturesRelations::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductScreenshots()
    {
        return $this->hasMany(ProductScreenshots::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductVideos()
    {
        return $this->hasMany(ProductVideo::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductRatings()
    {
        return $this->hasMany(UserProductRatings::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductReviews()
    {
        return $this->hasMany(UserProductReviews::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProductUsages()
    {
        return $this->hasMany(UserProductUsage::className(), ['product_id' => 'id']);
    }
}
