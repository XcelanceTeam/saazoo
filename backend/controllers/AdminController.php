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

class AdminController extends \yii\web\Controller
{
    public $layout = "administrator";
    
    /*public function beforeAction($action){
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }*/
    
    public function actionIndex()
    {
        return $this->render('index');    
       
    }
    
    public function actionLogin()
    {
        $this->layout = '';
        $this->view->title='';
    }
    
    public function actionLoginAjax()
    {
        $email = $_GET['email'];
        $pwd = $_GET['pwd'];
        $res=array();
        if($email != "admin")
        {
            $res = array("status"=>1, "msg"=>"Invalid Username", "data"=>array("name"=>NULL, "email"=>NULL));
        }
        else
        {
            $res = array("status"=>0, "msg"=>"success", "data"=>array("name"=>"Full Name", "email"=>$email));
        }
        echo Json::encode($res);
    }
    
    public function actionAddRoleAjax()
    {
        $request = Yii::$app->request;
        if ($request->isPost){           
            $role = $request->getBodyParam('role');
            $exRole = UserRoles::find()->where("role_name='".$role."'")->one();
            if($exRole)
            {
                echo Json::encode(array('status'=>2, 'msg'=>'exists'));
            }
            else
            {
                $usrRole = new UserRoles();
                $usrRole->role_name = $role;
                $usrRole->status = 0;
                if($usrRole->save())
                {
                    echo Json::encode(array('status'=>0, 'msg'=>'success'));
                }
                else
                {
                    echo Json::encode(array('status'=>1, 'msg'=>'error','errormessages'=>$userRole->getErrors()));
                }
            }
        }
        else{
            echo Json::encode(array('status'=>3, 'msg'=>'unknown error'));
        }
        //Handle the JSON Responses accordingly :) - Malvinder
    }
    
    public function actionGetCsrfAjax(){
        $csrf = Yii::$app->request->getCsrfToken();
        $res = array("status" => 1, "data" => array("csrf"=>$csrf));
       echo Json::encode($res);
    }
    
    /*
    *  Get Roles
    */
    
    public function actionGetRolesAjax(){        
        $itemsperpage = $_GET['itemsPerPage'];
        $pageno = $_GET['pageno'];
        $userRole = new UserRoles();
        $roles = $userRole::find() 
            ->offset(($pageno-1)*$itemsperpage)
            ->limit($itemsperpage)
            ->all();
        $count = $userRole::find()->count();
        echo Json::encode(array('status'=>0, 'msg'=>'success','data' => $roles,'total_count' => $count));
    }
    
    /*
    * Update User Role
    */
    
    public function actionEditRoleAjax(){
        $request = Yii::$app->request;
        if ($request->isPost){ 
            $roleChangeRequestData = $request->getBodyParam('userrole');                      
            $userRole = UserRoles::findOne($roleChangeRequestData['id']);          
            $userRole->role_name = $roleChangeRequestData['role_name'];
            $userRole->status = $roleChangeRequestData['status'];          
            if($userRole->update()!==false){
                 echo Json::encode(array('status'=>0, 'msg'=>'success'));
            }
            else
            {
                echo Json::encode(array('status'=>1, 'msg'=>'error','errormessages'=>$userRole->getErrors()));
            }
           
        }
        else{
            echo Json::encode(array('status'=>3, 'msg'=>'unknown error'));
        }
    }
    
    /*
    *  Delete Role
    */
    
    public function actionDeleteRoleAjax(){
         $request = Yii::$app->request;
        if ($request->isPost){ 
            $roleid = $request->getBodyParam('roleid'); 
            $userRole = UserRoles::findOne($roleid);
            if($userRole->delete()!==false){
                echo Json::encode(array('status'=>0, 'msg'=>'success'));
            }else{
                echo Json::encode(array('status'=>1, 'msg'=>'error','errormessages'=>$userRole->getErrors()));
            }
        }else{
            echo Json::encode(array('status'=>3, 'msg'=>'unknown error'));
        }
    }

}
