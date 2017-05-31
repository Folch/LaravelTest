(function () {

    var myApp = angular.module('myApp',
        ['dependencies',
            'main'
        ]);

    myApp.config(function ($locationProvider, $urlRouterProvider) {


        $urlRouterProvider.when('', '/index');


        $locationProvider.html5Mode(false);
    });
})();