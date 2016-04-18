saazooApp.service('userService', function($http, $q){
    return({
        addRole : addRole,
        getCsrf : getCsrf, 
        getRoles : getRoles,
        updateRole: updateRole,
        deleteRole: deleteRole,
    });

    /*
    *  get csrf token from yii
    */
    function getCsrf(){       
      return  $http.get(url+'admin/get-csrf-ajax').then(function(response){
          return response.data;
        });
    }
    
    /*************************Role Area Functions Start********************************/
    /*
    * Save Role
    */
    function addRole(role,csrftoken){        
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

    /*
    * Handle Success Response
    */
    
    function handleSuccess(response){
         return(response.data);
    }

    /*
    * Handle Error Response
    */
    
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
    *   Get Roles
    */
    
    function getRoles(pageno, itemsPerPage){
       
        var request = $http({
            method: "get",
            url: url+"admin/get-roles-ajax",          
            params: {
                pageno: pageno, 
                itemsPerPage : itemsPerPage,
            },
        });
        return(request.then(handleSuccess, handleError));
    }
    
    /*
    * Update Role 
    */
    
    function updateRole(userrole,csrftoken){
        return $http.post(url+"admin/edit-role-ajax",{"userrole" : userrole,"_csrf" : csrftoken}).success(function(response){
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
    
    /*
    *  Delete User Role
    */
    
    function deleteRole(roleid,csrftoken){
        return $http.post(url+"admin/delete-role-ajax",{"roleid" : roleid,"_csrf" : csrftoken}).success(handleSuccess).error(handleError);
    }
    
});