/**
 * Created by albert on 30/05/17.
 */
(function () {

    var module = angular.module('main', []);

    module.config(function ($stateProvider, $locationProvider, $urlMatcherFactoryProvider) {

        $locationProvider.hashPrefix('!');
        $urlMatcherFactoryProvider.strictMode(false);

        $stateProvider
            .state('index',
                {
                    url: '/index',
                    views: {
                        'content': {
                            templateUrl: 'app/modules/main/main.html',
                            controller: 'MainController as vm'
                        }
                    }
                }
            );

    });

})();