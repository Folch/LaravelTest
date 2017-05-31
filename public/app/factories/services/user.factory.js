(function () {

    angular.module('myApp')
        .service("userProvider", userProvider);

    function userProvider($http, dialogProvider) {


        return {
            getUsers: getUsers
        };

        function getUsers(callbackSuccess, callbackError) {

            $http.get("/api/v1/users")
                .then(
                    function (response) {
                        // success callback
                        callbackSuccess(response);
                    },
                    function (response) {
                        dialogProvider.showDialog(response);
                        // failure callback
                        callbackError(response);
                    }
                );
        }


    }

})();
