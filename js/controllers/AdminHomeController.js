saazooApp.controller('adminHomeController', function($scope,$http,appSettings,userService,$location,$filter,$timeout){
   $scope.appSettings = appSettings;
   $scope.copyyear = new Date().getFullYear();
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
    
    //RoleModel
    
    $scope.userrole = {
        "id" : "",    
        "role" : "",
        "status" : "",       
        
    };
    $scope.msg = "",
    // Function to create new Role
    $scope.alertVisible = true;
    $scope.newRole = function(){
   
       var request = $scope.csrf;  
        
       $scope.addRole = userService.addRole($scope.userrole.role,$scope.csrftoken).then(function(result){          
            $scope.res = result;          
            if($scope.res.data.status == 0)
            {
                $scope.msg= $filter('uppercase')(appSettings.addrolesuccess);
                $scope.alerttype = 'success';
                console.log($scope.userrole.msg);
               // $scope.userrole.role = res.data.name; 
                $scope.userrole = {};
                $location.path('admin/userroles');
                $timeout(function() {  $scope.msg = '';}, 2000);             
               
                
            }else if($scope.res.data.status == 2){
                // Role Exists
                $scope.alerttype = 'warning';
                $scope.msg= appSettings.rolealreadyexists;
                console.log($scope.userrole.msg);
                $location.path('admin/addnewrole');
               //$timeout(closeAlert, 1000);
                
            }else if($scope.res.data.status == 3){
                $scope.alerttype = 'danger';
                $scope.userrole.msg= appSettings.unknownerror;
                console.log($scope.userrole.msg);
                $location.path('admin/addnewrole');
               // $timeout(closeAlert, 1000);
            }else{
                $scope.alerttype = 'danger';
                $errors  = $scope.res.data.data.errormessages;
               // $t = $errors.errormessages;
                var errormessages = "";
                angular.forEach($errors, function($error , $values){
                   
                    errormessages = errormessages+$error[0]+" & ";
                });
                $scope.msg= errormessages.slice(0,-2);
               // $scope.userrole.role = res.data.name;
                 console.log($scope.userrole.msg);
                $location.path('admin/addnewrole');
                // $timeout(closeAlert, 1000);
            }
       });    
    };
    
    // get csrf token from yii2
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
    
//  $timeout(function() { alert.expired = true; }, 2000);
    
    
    
});