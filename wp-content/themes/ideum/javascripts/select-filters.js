'use strict';

var App = angular.module('ideum.selectFilters', []);

App.controller('projectFilterCtrl', [
  '$scope', '$window',
  function ($scope, $window) {
    $scope.$watch('projectType', function (type, oldType) {
      if (type === oldType) return;

      // FIXME: real filter
    });
  }
]);

App.controller('socialFilterCtrl', [
  '$scope', '$window',
  function ($scope, $window) {
    $scope.$watch('socialSource', function (source, oldSource) {
      if (source === oldSource) return;

      $window.location.search = 'source=' + source;
    });
  }
]);
