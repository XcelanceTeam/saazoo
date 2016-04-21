var saazooApp = angular.module('saazooApp', ['ui.router','ui.bootstrap','angularUtils.directives.dirPagination','vcRecaptcha']);//'ui.router',
var url = "http://localhost/saazoo/backend/index.php/";
/*saazooApp.constant("CSRF_TOKEN", '{!! csrf_token() !!}');
saazooApp.run( function run($http){
   // $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $http.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");
});*/
