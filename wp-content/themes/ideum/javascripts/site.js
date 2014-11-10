'use strict';

var App = module.exports =  angular.module('ideum', [
  // Angular libraries
  'ngAnimate',

  // Third-party libraries
  'angular-carousel',
  'ui.select2',

  // Project code
  'ideum.productDetails',
  'ideum.tabs',
  'ideum.video',
  'ideum.selectFilters'
]);

App.factory('screenSize', function ($window) {
  return function () {
    var width = angular.element($window).width();

    if (width >= 960) {
      return 'large';
    } else if (width >= 640) {
      return 'medium';
    } else {
      return 'small';
    }
  };
});

App.run(function ($rootScope, $document, screenSize) {
  $rootScope.responsiveOneUp = function () {
    return 1;
  };

  $rootScope.responsiveTwoUp = function () {
    switch (screenSize()) {
      case 'large':  return 2;
      default:       return 1;
    }
  };

  $rootScope.responsiveThreeUp = function () {
    switch (screenSize()) {
      case 'large':  return 3;
      case 'medium': return 2;
      default:       return 1;
    }
  };

  $rootScope.responsiveFourUp = function () {
    switch (screenSize()) {
      case 'large':  return 4;
      case 'medium': return 3;
      default:       return 2;
    }
  };
});

require('./animations');
require('./header');
require('./footer');
require('./expander');
require('./product-details');
require('./select-filters');
require('./tabs');
require('./touch-tables');
require('./colorbox');
