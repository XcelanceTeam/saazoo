saazooApp.service('loginService', function($http, $q){
    return ({
        authenticate: authenticate,
        getCountries : getCountries,
    });
    
    
    /*
    *  Authenticate User - LOGIN
    */
    
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
    
    /*
    * Handle Success
    */
    
    function handleSuccess(response)
    {
        return(response.data);
    }
    
    /*
    * Handle Error
    */    
    
    function handleError( response ) {
        
        if (
            ! angular.isObject( response.data ) ||
            ! response.data.msg
            ) {
            return( $q.reject( "An unknown error occurred." ) );
        }
        return( $q.reject( response.data.msg ) );
    }
    
    /*
    *  Get Country List
    */
    
    function getCountries(){
        var request = $http({
            method: "get",
            url: url+"user/get-country-list-ajax",
        });
        return (request.then(handleSuccess,handleError));
    }
    

});