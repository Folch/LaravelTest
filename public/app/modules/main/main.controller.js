/**
 * Created by albert on 30/05/17.
 */
(function () {

    angular.module('main')
        .controller('MainController', MainController);

    function MainController(postProvider, loginProvider, dialogProvider) {
        var vm = this;

        var login = 'true' === sessionStorage.getItem('login');

        vm.loginCorrect = true;
        vm.showLogin = !login;
        vm.isAdmin = login;


        vm.save = save;
        vm.create = create;
        vm.cancel = cancel;
        vm.login = loginFunction;
        vm.logout = logout;

        getPosts(null);

        function logout() {
            vm.showLogin = true;
            vm.isAdmin = false;
            sessionStorage.setItem('login', false);
        }

        function loginFunction(email, psw) {
            loginProvider.login(email, psw, function (response) {
                $('#login-modal').modal('hide');
                vm.isAdmin = true;
                vm.loginCorrect = true;
                vm.showLogin = false;
                sessionStorage.setItem('login', true);
                console.log('ok');
            }, function (response) {
                vm.loginCorrect = false;
                vm.isAdmin = false;
                sessionStorage.setItem('login', false);
                console.log('ko');
            });
        }

        function save(post) {
            postProvider.updatePost(post, function (response) {
                post.editshow = true;
            }, function (response) {

            });
        }

        function create(post) {
            postProvider.createPost(post, function (response) {
                var p = JSON.parse(JSON.stringify(response.data));
                p.editshow = true;
                if (p.active) {
                    vm.posts.push(p);
                } else {
                    dialogProvider.showDialogFromText('Post created but not shown as it is not active');
                }


            }, function (response) {

            });
        }

        function cancel(post) {
            postProvider.getPosts(post.id, function (response) {
                for (var i = 0; i < vm.posts.length; i++) {

                    if (vm.posts[i].id = response.data.id) {
                        vm.posts[i] = response.data;
                        vm.posts[i].editshow = true;
                        break;
                    }
                }

            }, function (response) {
            });
        }

        function getPosts(id) {
            postProvider.getPosts(id, function (response) {
                var i;
                if (id === null) {
                    vm.posts = response.data;
                    for (i = 0; i < vm.posts.length; i++) {
                        vm.posts[i].editshow = true;
                    }
                } else {
                    for (i = 0; i < vm.posts.length; i++) {
                        vm.posts[i].editshow = true;
                        if (vm.posts[i].id = response.data[i].id) {
                            vm.posts[i] = response.data[i];
                        }
                    }
                }


            }, function (response) {
            });
        }

    }
})();