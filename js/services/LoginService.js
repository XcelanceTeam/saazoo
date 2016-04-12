saazooApp.service('loginService', function($http, $q){
    return ({
        authenticate: authenticate,
    });
    
    function authenticate(username, password)
    {
        var request = $http({
            method: "get",
            url: url+"admin/login-ajax",
            params: {
                email: username,
                pwd: password,
            },
            
        });
        return(request.then(handleSuccess, handleError));
    }
    
    function handleSuccess(response)
    {
        return(response.data);
    }
    
    function handleError( response ) {
        
        if (
            ! angular.isObject( response.data ) ||
            ! response.data.msg
            ) {
            return( $q.reject( "An unknown error occurred." ) );
        }
        return( $q.reject( response.data.msg ) );
    }

});