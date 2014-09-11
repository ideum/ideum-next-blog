(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
//= require jquery
//= require select2
//= require angular/angular
//= require angular/angular-animate
//= require angular/angular-touch
//
//= require angular-carousel
//= require angular-ui-select2

'use strict';

var App = module.exports =  angular.module('ideum', [
  // Angular libraries
  'ngAnimate',

  // Third-party libraries
  'angular-carousel',
  'ui.select2'

  // Project code
]);

require('./animations');
require('./header');
require('./footer');

},{"./animations":2,"./footer":3,"./header":4}],2:[function(require,module,exports){
'use strict';

var App = angular.module('ideum');

App.animation('.scroll-bottom', function () {
  return {
    beforeAddClass: function (element, className, done) {
      if (className !== 'ng-hide') return;

      var height = jQuery(window).height();

      jQuery('html, body').animate({
        scrollTop: jQuery(element).offset().top - height
      }, done);
    },

    removeClass: function (element, className, done) {
      if (className !== 'ng-hide') return;

      var height = jQuery(window).height(),
          elHeight = jQuery(element).height();

      jQuery('html, body').animate({
        scrollTop: jQuery(element).offset().top - height + elHeight
      }, done);
    },
  };
});

},{}],3:[function(require,module,exports){
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

},{}],4:[function(require,module,exports){
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

},{}]},{},[1]);
