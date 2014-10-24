'use strict';

var App = angular.module('ideum.productDetails', ['ngAnimate']);

App.factory('ProductDetails', function ($http, $sce, $q) {
  return {
    get: function () {
      // return $http.get('/js/data/product_details.json').then(function (response) {
      //   var details = response.data;

      //   angular.forEach(details, function (detail) {
      //     detail.content = $sce.trustAsHtml(detail.content);
      //   });

      //   return details;
      // });

      var deferred = $q.defer();
      angular.forEach(IDEUM_SITE.product_details, function (detail) {
        //checks if the data has already been trusted for html
        try{
          $sce.getTrustedHtml(detail.content);
        }
        catch (e){
          detail.content = $sce.trustAsHtml(detail.content);
        } 
      });
      deferred.resolve(IDEUM_SITE.product_details);
      return deferred.promise;
    }
  };
});

App.controller('xRayCtrl', function ($scope, ProductDetails) {
  $scope.productDetails = [];
  $scope.detailOpen = false;

  $scope.overlayStyle = {};

  ProductDetails.get().then(function (data) {
    $scope.productDetails = data;
    $scope.currentDetail = 0;
  });

  $scope.goToDetail = function (idx) {
    var offset = 500 / ($scope.productDetails.length - 1);

    $scope.currentDetail = idx;
    if ($scope.detailOpen) {
      $scope.overlayStyle = {
        top: 0,
        height: '100%'
      };
    } else {
      $scope.overlayStyle = {
        top: (offset * idx) + 'px',
        backgroundPosition: 'center ' + (-offset * idx) + 'px'
      };
    }
  };

  $scope.hasPrev = function () {
    return $scope.currentDetail > 0;
  };

  $scope.hasNext = function () {
    return $scope.currentDetail < ($scope.productDetails.length - 1);
  };

  $scope.prev = function () {
    if ($scope.hasPrev()) {
      $scope.goToDetail($scope.currentDetail - 1);
    }
  };

  $scope.next = function () {
    if ($scope.hasNext()) {
      $scope.goToDetail($scope.currentDetail + 1);
    }
  };

  $scope.openDetail = function (isOpen) {
    $scope.detailOpen = isOpen;
    $scope.goToDetail($scope.currentDetail);
  };
});
