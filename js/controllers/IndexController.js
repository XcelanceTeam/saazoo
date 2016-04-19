saazooApp.controller('indexController', function($scope, $http, $state, $location, $window, loginService){
    $window.location.title = "Saazoo Welcomes you";
    $scope.pageTitle = "Welcome to Saazoo - Get your App Listed";
    $scope.title  = $state.current.title;
    //Site top menus
    $scope.menus = [
        {
            "name": "Browse",
            "link": "#/home",
        },
        {
            "name": "Top Apps",
            "link": "#/admin/home",
        },
        {
            "name": "Lab",
            "link": "#",
        },
        {
            "name": "Sign In",
            "link": "javascript:void(0);",
        },
    ];
    
    //Login Modal on front page
    $scope.showModal=false;
    $scope.toggleLogin = function(){
        //console.log("This is called");
        $scope.showModal = !$scope.showModal;
        //console.info($scope.showModal);
    };
    
    //Fetching Login Credentials from backend
    $scope.user= {
        "email": "",
        "password": "",
        "msg": "",
    };
    
    $scope.loginUser = function(){
        $scope.loginResult = loginService.authenticate($scope.user.email, $scope.user.password).then(function(result){
            $scope.res = result;
            if($scope.res.status == 0)
            {
                $scope.user.msg= "Succesfully Logged In";
                console.info("Name", $scope.res.data.name);
                console.info("Email", $scope.res.data.email);
                $("#login-modal").modal('toggle');
              
                $scope.pageTitle = "Admin Panel";
                var destinationurl = "http://"+$window.location.host+'/saazoo/admin/index.html';
                $window.location.href = destinationurl;
               //$location.path('/admin/home');  
               // $window.location.href('/admin/home');
            }
            else
            {
                console.error($scope.res.msg);
                $scope.user.msg = $scope.res.msg;
            }
        });
    };
    
    //Login Function Ends here
    
    /*
    * Current Location
    */
    $scope.currentPage = $location.path();
    
    /*
    *  Forgot Password
    */
    
    $scope.forgotPassword = function(){
        var destinationurl = "http://"+$window.location.host+'/saazoo/user/index.html#/forgot-password';
        $window.location.href = destinationurl;
    }
    
    /*
    *  Register User Form
    */
    
    $scope.registerUser = function(){
        var destinationurl = "http://"+$window.location.host+'/saazoo/user/index.html#/register';
        $window.location.href = destinationurl;
    }
});