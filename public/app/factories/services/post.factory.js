(function () {

    angular.module('myApp')
        .service("postProvider", postProvider);

    function postProvider($http, dialogProvider) {


        return {
            getPosts: getPosts,
            updatePost: updatePost,
            createPost: createPost
        };

        function getPosts(id, callbackSuccess, callbackError) {
            if (id === null) {
                id = '';
            } else {
                id = '/' + id;
            }
            $http.get("/api/v1/posts" + id)
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

        function updatePost(post, callbackSuccess, callbackError) {
            $http.post("/api/v1/posts/" + post.id, post)
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

        function createPost(post, callbackSuccess, callbackError) {
            $http.post("/api/v1/posts/", post)
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
