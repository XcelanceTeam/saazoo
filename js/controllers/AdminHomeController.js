saazooApp.controller('adminHomeController', function($scope,$http,appSettings,userService,$location,$filter,$timeout){
   $scope.appSettings = appSettings;
   $scope.copyyear = new Date().getFullYear();
    
    /************************MENUES**************************/
     $scope.menus = [
        {
            "name": "Dashboard",
            "link": "#/home",
            "icon": "fa fa-dashboard"
        },
        {
            "name": "Users",
            "subItems" : [
                {
                    "name" : "User Roles",
                    "link" : "#/admin/userroles",
                    "icon" : "fa fa-cog"
                },
                {
                    "name" : "Users List",
                    "link": "#/admin/users",
                    "icon": "fa fa-user"
                }
             ],
            "icon": "fa fa-users"
        }
    ];
    //$scope.newRoleTitle = "Please enter the role and click submit to create new role";
    
   /*****************MODELS*************************/ 
    //Role Model
    
    $scope.userrole = {
        "id" : "",    
        "role_name" : "",
        "status" : "",       
        
    };
    
    
    /**********************MODEL END**************************/
    
    $scope.msg = "",
    $scope.rolepageHeading = "Add new role";
    
    $scope.alertVisible = true;
    
    /*
    * Retrieve csrf token from yii2
    */ 
    $scope.csrf = userService.getCsrf().then(function(result){
            $scope.csrftoken = result.data.csrf;
        });
    
    $scope.closeAlert = function() {       
        $scope.msg = '';
        $scope.startFade = true;
        $timeout(function(){
            $scope.hidden = true;
        }, 2000);
    };
    
    /*************ROLE SECTION**********************************/
    
    /*
    *   Create Or Update Role
    */
    $scope.newRole = function(){           
       var request = $scope.csrf;
        
       /*
       *  Save Role
       */    
        
       if($scope.rolepageHeading=='Add new role'){
           $scope.addRole = userService.addRole($scope.userrole.role_name,$scope.csrftoken).then(function(result){          
                $scope.res = result;          
                if($scope.res.data.status == 0)
                {
                    $scope.msg= $filter('uppercase')(appSettings.ADDROLESUCCESS);
                    $scope.alerttype = 'success';                    
                    $scope.userrole = {};
                    $scope.getRoles($scope.pageno);
                    $location.path('admin/userroles');
                    $timeout(function() {  $scope.msg = '';}, 2000);             


                }else if($scope.res.data.status == 2){
                    // Role Exists
                    $scope.alerttype = 'warning';
                    $scope.msg= appSettings.ROLEALREADYEXISTS;                   
                    $location.path('admin/addnewrole');
                   $timeout(function() {  $scope.msg = '';}, 2000);

                }else if($scope.res.data.status == 3){
                    $scope.alerttype = 'danger';
                    $scope.userrole.msg= appSettings.UNKNOWNERROR;                   
                    $location.path('admin/addnewrole');  
                    $timeout(function() {  $scope.msg = '';}, 2000);
                }else{
                    $scope.alerttype = 'danger';
                    $errors  = $scope.res.data.data.errormessages;                  
                    var errormessages = "";
                    angular.forEach($errors, function($error , $values){

                        errormessages = errormessages+$error[0]+" & ";
                    });
                    $scope.msg= errormessages.slice(0,-2);
                    $location.path('admin/addnewrole');
                    $timeout(function() {  $scope.msg = '';}, 2000);
                }
            });
        }
        else{
            
            /*
            *   Update Role
            */
            $scope.updateRole = userService.updateRole($scope.userrole,$scope.csrftoken).then(function(result){          
                $scope.res = result;    
               
                if($scope.res.data.status == 0)
                {
                    $scope.msg= $filter('uppercase')(appSettings.ROLEUPDATESUCCESS);
                    $scope.alerttype = 'success';
                    $scope.userrole = {};
                    $scope.getRoles($scope.pageno);
                    $location.path('admin/userroles');
                    $timeout(function() {  $scope.msg = '';}, 2000);             


                }else if($scope.res.data.status == 2){
                    // Role Exists
                    $scope.alerttype = 'warning';
                    $scope.msg= appSettings.ROLEALREADYEXISTS;                
                    $location.path('admin/editrole');                 

                }else if($scope.res.data.status == 3){
                    $scope.alerttype = 'danger';
                    $scope.userrole.msg= appSettings.UNKNOWNERROR;                  
                    $location.path('admin/editrole');                
                }else{
                    $scope.alerttype = 'danger';
                    $errors  = $scope.res.data.data.errormessages;                 
                    var errormessages = "";
                    angular.forEach($errors, function($error , $values){
                        errormessages = errormessages+$error[0]+" & ";
                    });
                    $scope.msg= errormessages.slice(0,-2);
                    $location.path('admin/editrole');                   
                }
            });
        }
           
    };
    
    
  /*  $scope.colors = [
      {itemPerPage:'2'},
      {itemPerPage:'4'},
      {itemPerPage:'6'},
      {itemPerPage:'8'},
      {itemPerPage:'10'}
    ];
    $scope.myColor = $scope.colors[0];
    */
    
    /*
    *   show_first Number of records in the list.
    */
     
        $scope.itmesPerPage1 = [
            {itemPerPage: 2},
            {itemPerPage: 4},
            {itemPerPage: 6}
            ];
        $scope.itemsPerPage=  $scope.itmesPerPage1[0];
        
    /*
    *   Pagination Paramters
    */
    
    $scope.pageno = 1;
    $scope.total_count = 0;
    
    /*
    *    Get Roles
    */
  
    $scope.getRoles = function(pageno){      
       
        userService.getRoles(pageno,$scope.itemsPerPage.itemPerPage).then(function(result){
          $scope.userroles = [];
            if(result.data.length>0){                 
                angular.forEach(result.data,function(userrole,key){                 
                    $scope.userrole = userrole;
                    $scope.userroles.push($scope.userrole);
                    $scope.userrole ={};
                });
                $scope.total_count = result.total_count;
                $scope.fromRecord = ($scope.itemsPerPage.itemPerPage*(pageno-1))+1;
                $scope.toRecord = ($scope.itemsPerPage.itemPerPage*pageno>$scope.total_count)?$scope.total_count:$scope.itemsPerPage.itemPerPage*pageno;
            }else{
                $scope.alerttype = 'warning';
                $scope.msg = appSettings.EMPTYDATA;
            }
        });
    };
    
    /*
    *      EDIT ROLE
    */
    
    $scope.editRole = function(roleid){
        angular.forEach($scope.userroles,function(userrole,key){
            if(userrole.id == roleid){            
                $scope.userrole = userrole;
            }            
        });
        $scope.rolepageHeading = "Edit Role";
        $location.path('admin/editrole');
    };
    
    /*
    *  Delete Role
    */
    
    $scope.deleteRole = function(roleid){
          var request = $scope.csrf;
        userService.deleteRole(roleid,$scope.csrftoken).then(function(result){
              $scope.res = result;
               
                if($scope.res.data.status == 0)
                {
                    $scope.msg= $filter('uppercase')(appSettings.ROLEDELETESUCCESS);
                    $scope.alerttype = 'success';
                    $scope.userrole = {};
                    $scope.getRoles($scope.pageno);
                    $location.path('admin/userroles');
                    $timeout(function() {  $scope.msg = '';}, 2000);
                }else if($scope.res.data.status == 3){
                    $scope.alerttype = 'danger';
                    $scope.userrole.msg= appSettings.UNKNOWNERROR;                   
                    $location.path('admin/userroles');
                  
                }else{
                    $scope.alerttype = 'danger';
                    $errors  = $scope.res.data.data.errormessages;                  
                    var errormessages = "";
                    angular.forEach($errors, function($error , $values){

                        errormessages = errormessages+$error[0]+" & ";
                    });
                    $scope.msg= errormessages.slice(0,-2);
                    $location.path('admin/userroles');
                  
                }
        });
    }
    
    
    
    
    //$scope.itemsPerPage = ($scope.show_first == null) ? 2 : $scope.show_first;
    
    /*
    *  SORT Function
    */
    
    $scope.sort = function(keyname){
      
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
    
  
    /*
    *  Get Roles for view
    */
    
    $scope.getRoles($scope.pageno) ; 

   
    
   
    
   
    $scope.getItemsPerPage = function(){
      
        $scope.itemsPerPage= this.itemsPerPage; 
        $scope.getRoles($scope.pageno) ; 
    }
    
    
    
    
    
});