saazooApp.config(function($stateProvider, $urlRouterProvider,$locationProvider){
    //console.log($stateProvider);
    $urlRouterProvider.otherwise('/home');
    $stateProvider.state('home',{
        url: '/home',
        templateUrl: 'partials/home.html',
        data: {pageTitle: 'Welcome To Saazoo'}
    }) .state('users',{
        url: '/users',
        templateUrl: 'partials/users.html',
        data: {pageTitle: 'Admin Panel - Users'},
    }).state('newuser',{
        url: '/addnewuser', // /admin
        templateUrl: 'partials/newuser.html'
    }).state('userroles',{
        url : '/userroles', // /admin
        templateUrl : 'partials/userroles.html'
    }).state('newrole',{// /admin
        url : '/addnewrole',
        templateUrl : 'partials/newrole.html'
    }).state('editrole',{
        url : '/editrole', // /admin
        templateUrl : 'partials/newrole.html'
    }).state('login',{
        url : '/login',
        templateUrl : 'partials/login.html'
    }).state('forgot-password',{
        url : '/forgot-password',
        templateUrl : 'partials/forgetpassword.html'
    }).state('registeruser',{
        url : '/register',
        templateUrl : 'partials/register.html'
    }).state('admin',{
        url : '/admin',
        templateUrl : 'partials/home.html'
    });
    
    $locationProvider.html5Mode(true);
   
   // $stateProvider.go($stateProvider.current, {}, {reload: true});
       
});



