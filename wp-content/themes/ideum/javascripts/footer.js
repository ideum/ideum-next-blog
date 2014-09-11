'use strict';

var App = angular.module('ideum');

App.controller('footerCtrl', ['$scope', function ($scope) {
  $scope.showNewsletter = false;
  $scope.showSitemap = false;

  $scope.toggleNewsletter = function () {
    $scope.showNewsletter = !$scope.showNewsletter;
    $scope.showSitemap = false;
  };

  $scope.toggleSitemap = function () {
    $scope.showNewsletter = false;
    $scope.showSitemap = !$scope.showSitemap;
  };
}]);
