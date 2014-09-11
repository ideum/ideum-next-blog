'use strict';

var App = angular.module('ideum');

App.directive('ideumMobileSlideoutMenu', ['$rootScope', function ($rootScope) {
  return {
    scope: true,
    link: function (scope, element, attrs) {
      scope.open = false;

      scope.close = function () {
        scope.open = false;
      };

      $rootScope.$on('toggleMobileSlideoutMenu', function () {
        scope.open = !scope.open;
      });
    }
  };
}]);

App.controller('headerCtrl', ['$scope', function ($scope) {
  $scope.toggleMenu = function () {
    $scope.$emit('toggleMobileSlideoutMenu');
  };
}]);
