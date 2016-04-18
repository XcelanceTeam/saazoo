saazooApp.config(function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise('/home');
    $stateProvider.state('home',{
        url: '/home',
        templateUrl: 'partials/home.html',
        data: {pageTitle: 'Welcome To Saazoo'},
    }) .state('/users',{
        url: '/admin/users',
        templateUrl: 'partials/users.html',
        data: {pageTitle: 'Admin Panel - Users'},
    }).state('/newuser',{
        url: '/admin/addnewuser',
        templateUrl: 'partials/newuser.html'
    }).state('/userroles',{
        url : '/admin/userroles',
        templateUrl : 'partials/userroles.html'
    }).state('/newrole',{
        url : '/admin/addnewrole',
        templateUrl : 'partials/newrole.html'
    }).state('/editrole',{
        url : '/admin/editrole',
        templateUrl : 'partials/newrole.html'
    });
});
/*saazooApp.config(function($routeProvider, $locationProvider){
    $routeProvider.
    when('/home', {templateUrl: 'partials/home.html'}).
    when('/admin/home', {templateUrl: 'partials/admin/home.html'}).
    otherwise({redirectTo: '/home/'});
    $locationProvider.html5Mode({enabled: true, requireBase: false});
});*/