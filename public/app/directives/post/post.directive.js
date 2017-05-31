/**
 * Created by albert on 31/05/17.
 */
/**
 * Created by albert on 17/05/17.
 */
(function () {

    angular
        .module('myApp')
        .directive('postBox', PostBox);

    function PostBox() {

        return {
            restrict: 'EA', //Default in 1.3+
            scope: {
                ngModel: '=',//variable, @ string, & function
                isAdmin: '=',
                onCancel: '=',
                onSave: '=',
                onCreate: '=',
                state: '@'
            },
            require: 'ngModel',
            controllerAs: 'vm',
            replace: true,
            bindToController: true, //required in 1.3+ with controllerAs
            controller: Controller,
            templateUrl: '/app/directives/post/post.html'

        };


        function Controller(userProvider) {
            var vm = this;

            // Variables
            vm.currentPost = vm.ngModel || {};
            vm.cancel = cancel;
            vm.save = save;
            vm.create = create;

            if (vm.state === 'create') {
                vm.currentPost.active = false;
                vm.currentPost.published_at = moment().format('YYYY-MM-DD hh:mm:s');
                vm.currentPost.title = '';
                vm.currentPost.body = '';

                getUsers();
            }

            function getUsers() {
                userProvider.getUsers(function (response) {
                    vm.users = response.data;
                    vm.currentPost.user_id = vm.users[0].id;
                }, function (response) {

                });
            }

            function cancel(post) {
                vm.onCancel(post);
            }

            function save(post) {
                vm.onSave(post);
            }

            function create(post) {
                vm.onCreate(post);
            }
        }
    }
})();

