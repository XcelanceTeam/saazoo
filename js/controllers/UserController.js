saazooApp.controller('userController', function($scope,$http,appSettings,loginService,userService,$location,$filter,$timeout,$window){
    
   $scope.appSettings = appSettings;
   $scope.copyyear = new Date().getFullYear();
   $scope.login = function(){
       debugger;
        var destinationurl = "http://"+$window.location.host+'/saazoo/#/login';
        $window.location.href = destinationurl;       
    }
   /****************************MODEL DEFINATION***************************************/
   /*
   *   USER Model
   */
   
   $scope.user_personal_details = {
       "id" : "",
       "userid" : "",
       "first_name" : "",
       "last_name" : "",
       "gender" : "",
       "doj" : "",
       "notification_email" : "",
       "industry_type" : "",
       "monthly_budget" : "",
       "countryid" : "",
   };
    
   /*
   *   COUNTRY  Model
   */
    
    $scope.country = {
        "id" : "",
        "country_name" : "",
    };
   
    /*
    *  BUSINESS_CATEGORY Model
    */
    
    $scope.business_category = {
        "id" : "",
        "category_name" : "",
        "description" : "",
        "status" : "",
        "icon" : "",
    };
    
    /*
    *  USER_COMPANY_DETAILS Model
    */
    
    $scope.user_company_details = {
        "id" : "",
        "user_id" : "",
        "company_name" : "",
        "company_address" : "",
        "conpany_contact" : "",
        "contact_person" : "",
        "company_description" : "",
        "company_logo" : "",
        "business_sub_category" : "",
        "business_category" : "",
        "company_size" : "",
        "industry_type" : "",
        "org_type" : "",
        "status" : "",
        "company_website" : "",
        "contact_person_job_title" : "",
    };
/****************************MODEL DEFINATION ENDS***************************************/
/***********************COUNRTY SECTION START********************************/
    
    /*
    *   GET COUNRTY LIST
    */
    $scope.getCountries = function(){
        loginService.getCountries().then(function(result){
            $scope.res = result;            
            if($scope.res.status == 0){               
                $scope.msg = '';
                $scope.countrylist = [];
                angular.forEach($scope.res.data,function(country,val){
                    $scope.country = country;
                    $scope.countrylist.push($scope.country);    
                });
                $scope.defaultoption = {"id": 0, "country_name" : 'Please Select Country'};                
                $scope.countrylist.splice(0, 0,$scope.defaultoption);
                $scope.selectedCountry = $scope.countrylist[0];
                
            }else{
                $scope.alerttype = 'danger';
                $scope.userrole.msg= appSettings.UNKNOWNERROR; 
            }            
        });
    };
    
    $scope.getCountries();    
   
    $scope.getSelectedCountry = function(){
        if(this.selectedCountry.id == 0){
             $scope.alerttype = 'danger';
             $scope.msg= "Please Select Country!"; 
            
        }else{
            $scope.selectedCountry = this.selectedCountry;    
        }
    }
/************************COUNTRY SECTION ENDS**********************************/    
/*********************** BUSINESS CATEGORY STARTs**********************************/    

    $scope.getBusinessCategories = function(){
        userService.getBusinessCategories().then(function(result){
           $scope.res = result;
           if($scope.res.status == 0){               
                $scope.msg = '';
                $scope.businesscategorylist = [];
                angular.forEach($scope.res.data,function(businesscategory,val){
                    $scope.business_category = businesscategory;
                    $scope.businesscategorylist.push($scope.business_category);    
                });
                $scope.defaultoption = {"id": 0, "category_name" : 'Please Select Business Category'};                
                $scope.businesscategorylist.splice(0, 0,$scope.defaultoption);
                $scope.selectedBusinessCategory = $scope.businesscategorylist[0];
                
            }else{
                $scope.alerttype = 'danger';
                $scope.userrole.msg= appSettings.UNKNOWNERROR; 
            } 
        });
    };
    
    $scope.getBusinessCategories();
    
});