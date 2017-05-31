(function () {

    angular.module('myApp')
        .service("loginProvider", loginProvider);

    function loginProvider($http, dialogProvider) {


        return {
            login: login
        };

        function login(email, password, callbackSuccess, callbackError) {
            var data = {
                email: email,
                password: password
            };
            $http.post("/login", data)
                .then(
                    function (response) {
                        if (response.data.code === "OK") {
                            callbackSuccess(response);
                        } else {
                            callbackError(response);
                        }
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
