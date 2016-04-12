saazooApp.service('userService', function($http, $q){
    return({
      addRole : addRole,
      getCsrf : getCsrf,   
    });


    /*
    * Role Area Functions Start
    */
    function addRole(role,csrftoken){
        console.info("CSRF Value in Service: ", csrftoken);
      /* var request = $http({
                method: "post",
                url: url+"admin/add-role-ajax",
                params: {
                    role: role,
                    '_token':csrftoken
                }
            
            });
            return(request.then(handleSuccess, handleError));*/
        
       return $http.post(url+"admin/add-role-ajax",{"role" : role,"_csrf" : csrftoken}).success(function(response){
            return (response.data);
        }).error(function(response){
            if (
                ! angular.isObject( response.data ) ||
                ! response.data.msg
                ) {
                return( $q.reject( "An unknown error occurred." ) );
            }
            return( $q.reject( response.data.msg ) );
        });
    }

    function handleSuccess(response){
         return(response.data);
    }

    function handleError(response){
        if (
                ! angular.isObject( response.data ) ||
                ! response.data.msg
                ) {
                return( $q.reject( "An unknown error occurred." ) );
            }
            return( $q.reject( response.data.msg ) );
    }
    /*
    *  get csrf token from yii
    */
    function getCsrf(){       
      return  $http.get(url+'admin/get-csrf-ajax').then(function(response){
          return response.data;
        });
    }
});