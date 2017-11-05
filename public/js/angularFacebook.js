var app = angular.modulo('app');


app.controller('FacebookCtrl'['$scope' , '$http' , function($scope , $http){

    // Old SDK (deprecated)
    js.src = "//connect.facebook.net/en_US/all.js";

    // New SDK (v2.x)
    js.src = "//connect.facebook.net/en_US/sdk.js";


    $window.fbAsyncInit = function() {
        FB.init({ 
        appId: '{your-app-id}',
        status: true, 
        cookie: true, 
        xfbml: true,
        version: 'v2.4'
        });
    };


    

    $scope.getMyLastName = function() {
        facebookService.getMyLastName() 
        .then(function(response) {
            $scope.last_name = response.last_name;
        }
        );
    };

}]);


app.factory('facebookService', function($q) {
    return {
        getMyLastName: function() {
            var deferred = $q.defer();
            FB.api('/me', {
                fields: 'last_name'
            }, function(response) {
                if (!response || response.error) {
                    deferred.reject('Error occured');
                } else {
                    deferred.resolve(response);
                }
            });
            return deferred.promise;
        }
    }
});