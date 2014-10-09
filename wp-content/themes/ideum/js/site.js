(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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

},{"./animations":2,"./expander":3,"./footer":4,"./header":5,"./touch-tables":6}],2:[function(require,module,exports){
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

App.animation('.id-expander-item', function () {
  return {
    addClass: function (element, className, done) {
      if (className !== 'open') return;

      element.find('.item-content').slideDown(done);
    },

    removeClass: function (element, className, done) {
      if (className !== 'open') return;

      element.find('.item-content').slideUp(done);
    }
  };
});

},{}],3:[function(require,module,exports){
'use strict';

var App = angular.module('ideum');

App.directive('idExpander', function () {
  return {
    controller: function ($scope) {
      this.closeAll = function () {
        $scope.$broadcast('closeIdExpanderItems');
      };
    }
  };
});

App.directive('idExpanderItem', function ($animate) {
  return {
    scope: true,
    require: '^idExpander',
    controller: function ($scope) {
      this.toggle = function () {
        if ($scope.isOpen) {
          $scope.close();
        } else {
          $scope.open();
        }
      };
    },
    link: function (scope, element, attributes, idExpanderCtrl) {
      scope.isOpen = false;

      element.addClass('id-expander-item');

      scope.$on('closeIdExpanderItems', function () {
        scope.close();
      });

      scope.open = function () {
        idExpanderCtrl.closeAll();
        $animate.addClass(element, 'open');
        scope.isOpen = true;
      };

      scope.close = function () {
        $animate.removeClass(element, 'open');
        scope.isOpen = false;
      };
    }
  };
});

App.directive('idExpanderButton', function () {
  return {
    require: '^idExpanderItem',
    link: function (scope, element, attributes, idExpanderItemCtrl) {
      element.on('click', function () {
        idExpanderItemCtrl.toggle();
      });
    }
  };
});

},{}],4:[function(require,module,exports){
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

},{}],5:[function(require,module,exports){
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

},{}],6:[function(require,module,exports){
'use strict';

var App = angular.module('ideum.video', []);

App.directive('idAutoplay', function () {
  return {
    link: function (scope, element) {
      var video = element.find('video')[0];

      element.hover(function () {
        video.play();
      }, function () {
        video.pause();
      });
    }
  };
});

},{}]},{},[1]);
