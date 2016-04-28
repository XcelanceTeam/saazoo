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
    
    
    /*
    *  GET USER ROLE IDs
    */
    
    public function actionGetUserRoleAjax()
    {
        $request = Yii::$app->request;
        if ($request->isPost){
            $role = $request->getBodyParam('rolename');
            $exRole = UserRoles::find()->where("role_name='".$role."'")->one();
            if($exRole)
            {
                echo Json::encode(array('status'=>0, 'msg'=>'success','data'=>$exRole));
            }else{
                echo Json::encode(array('status'=>4, 'msg'=>'notexists'));
            }
            
        }
    }
    
    /*
    *  REGISTER USER- VENDORS
    */
    
    public function actionRegisterUserAjax(){
        $request = Yii::$app->request;
        if ($request->isPost){           
            $gRecaptchaResponse_param = $request->getBodyParam('gRecaptchaResponse');
            $user_login_request_param = $request->getBodyParam('user_login');
            $user_company_details_request_param = $request->getBodyParam('user_company_details');
            $user_personal_details_request_param = $request->getBodyParam('user_personal_details');
            
            /********************* USER_LOGIN SAVE************************/
            $userLogin = new UserLogin();
            $userLogin->email = $user_login_request_param['email'];
            $userLogin->password = Yii::$app->getSecurity()->generatePasswordHash($user_login_request_param['password']);
            $userLogin->status = 0;
            $userLogin->user_role = $user_login_request_param['user_role'];
            $userLogin->register_type = $user_login_request_param['register_type'];
            
            if($userLogin->save()){
                
            /********************* USER_PERSONAL_DETAILS SAVE************************/
                
                $userPersonalDetails =  new UserPersonalDetails();
                $userPersonalDetails->user_id = $userLogin->id;
                $userPersonalDetails->first_name = $user_personal_details_request_param['first_name'];
                $userPersonalDetails->last_name = $user_personal_details_request_param['last_name'];
                $userPersonalDetails->gender = $user_personal_details_request_param['gender'];
                $userPersonalDetails->industry_type = $user_personal_details_request_param['industry_type'];
                $userPersonalDetails->countryid = $user_personal_details_request_param['countryid'];
                $userPersonalDetails->monthly_budget = $user_personal_details_request_param['monthly_budget'];
                $userPersonalDetails->referred_by = $user_personal_details_request_param['referred_by'];
                $userPersonalDetails->notification_email = $userLogin->email;
                $userPersonalDetails->doj = new \yii\db\Expression('NOW()');
                
                if($userPersonalDetails->save()){
                    
                }else{
                    
                    echo Json::encode(array('status'=>1, 'msg'=>'error','errormessages'=>$userPersonalDetails->getErrors()));
                }
                
            /********************* USER_COMPANY_DETAILS SAVE************************/
                
                $userCompanyDetails = new UserCompanyDetails();
                
                $userCompanyDetails->business_category = $user_company_details_request_param['business_category'];
                $userCompanyDetails->business_sub_category = $user_company_details_request_param['business_sub_category'];
                $userCompanyDetails->company_address = $user_company_details_request_param['company_address'];
                $userCompanyDetails->company_description = $user_company_details_request_param['company_description'];
                $userCompanyDetails->company_logo = $user_company_details_request_param['company_logo'];
                $userCompanyDetails->company_name = $user_company_details_request_param['company_name'];
                $userCompanyDetails->company_size = $user_company_details_request_param['company_size'];
                $userCompanyDetails->company_website = $user_company_details_request_param['company_website'];
                $userCompanyDetails->company_contact = $user_company_details_request_param['company_contact'];
                $userCompanyDetails->contact_person = $user_company_details_request_param['contact_person'];
                $userCompanyDetails->contact_person_job_title = $user_company_details_request_param['contact_person_job_title'];
                $userCompanyDetails->industry_type = $user_company_details_request_param['industry_type'];
                $userCompanyDetails->org_type = $user_company_details_request_param['org_type'];
                $userCompanyDetails->status = 0;
                $userCompanyDetails->user_id = $userLogin->id;                
                if($userCompanyDetails->save()){
                    
                }else{
                     echo Json::encode(array('status'=>1, 'msg'=>'error','errormessages'=>$userCompanyDetails->getErrors()));
                }
                
            }
            
            
        }
    }
    
}

?>
