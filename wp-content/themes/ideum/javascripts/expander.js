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
