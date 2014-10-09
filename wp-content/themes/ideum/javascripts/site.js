'use strict';

var App = module.exports =  angular.module('ideum', [
  // Angular libraries
  'ngAnimate',

  // Third-party libraries
  'angular-carousel',
  'ui.select2',

  // Project code
  'ideum.video'
]);

App.factory('screenSize', function ($window) {
  // Technique adapted from http://css-tricks.com/making-sass-talk-to-javascript-with-json/
  return function () {
    var style, content, data;

    style = $window.getComputedStyle($window.document.body, '::before');
    if (!style) { return 'small'; }

    content = style.content;

    // Strip whatever quotes the browser wraps around our JSON
    content = content.replace(/^['"]+|\s+|\\|(;\s?})+|['"]$/g, '');

    data = angular.fromJson(content) || {};
    return data.screenSize;
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
require('./touch-tables');
