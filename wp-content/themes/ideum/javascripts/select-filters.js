'use strict';

var App = angular.module('ideum.selectFilters', []);

App.controller('socialFilterCtrl', [
  '$scope', '$window',
  function ($scope, $window) {
    $scope.$watch('socialSource', function (source, oldSource) {
      if (source === oldSource) return;

      $window.location.search = 'source=' + source;
    });
  }
]);
