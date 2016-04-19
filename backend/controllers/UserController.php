<?php
namespace app\controllers;
use yii;
use yii\web\Controller;
use yii\web\Session;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\base\Security;
use app\models\Advertisement;
use app\models\AppIntegrations;
use app\models\BusinessCategories;
use app\models\BusinessIndustries;
use app\models\BusinessMeta;
use app\models\BusinessSubCategories;
use app\models\CampaignDeductions;
use app\models\CompanySize;
use app\models\DeviceSupported;
use app\models\GeographicAreas;
use app\models\GuestLogging;
use app\models\LandingUrls;
use app\models\OrganizationType;
use app\models\Payments;
use app\models\PricingModels;
use app\models\Product;
use app\models\ProductAdminAnalysis;
use app\models\ProductAppIntegrations;
use app\models\ProductBenefits;
use app\models\ProductDeviceSupported;
use app\models\ProductFaq;
use app\models\ProductFaqAnswers;
use app\models\ProductFeaturesDepth;
use app\models\ProductFeatureSummary;
use app\models\ProductGeographicAreas;
use app\models\ProductKeyFeatures;
use app\models\ProductMeta;
use app\models\ProductOrganizationType;
use app\models\ProductPost;
use app\models\ProductPricing;
use app\models\ProductPricingModels;
use app\models\ProductProductKeyFeaturesRelations;
use app\models\ProductScreenshots;
use app\models\ProductVideo;
use app\models\SiteVisitors;
use app\models\UserBalance;
use app\models\UserCards;
use app\models\UserCompanyDetails;
use app\models\UserKeys;
use app\models\UserLinkdinDetails;
use app\models\UserLogging;
use app\models\UserLogin;
use app\models\UserPersonalDetails;
use app\models\UserProductRatings;
use app\models\UserProductReviews;
use app\models\UserProductUsage;
use app\models\UserRoles;
use app\models\UserSocialMedia;
use app\models\Countries;

class UserController extends \yii\web\Controller
{
    /*
    *   COUNTRY LIST
    */
    public function actionGetCountryListAjax()
    {
        $countrylist = Countries::find()->all();
        echo Json::encode(array('status'=>0, 'msg'=>'success','data' => $countrylist));
    }
    
    /*
    *  BUSINESS COUNTRY LIST
    */
    
    public function actionGetBusinessCategoryListAjax(){
        $businesscategorylist = BusinessCategories::find()->all();
        echo Json::encode(array('status'=>0, 'msg'=>'success','data' => $businesscategorylist));
    }
    
}

?>
