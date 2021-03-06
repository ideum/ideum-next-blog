'use strict';

var app = angular.module('ideum.tabs', []);

app.directive('tabs', function() {
  return {
    restrict: 'A',
    transclude: true,
    scope: {},
    controller: function($scope) {
      var panes = $scope.panes = [];

      $scope.select = function(pane) {
        angular.forEach(panes, function(pane) {
          pane.selected = false;
        });
        pane.selected = true;
      };

      this.addPane = function(pane) {
        if (panes.length === 0) {
          $scope.select(pane);
        }
        panes.push(pane);
      };
    },
    template: 
      '<div class="tabs-table">' +
          '<ul class="tabs-nav">' +
            '<li ng-repeat="pane in panes" ng-class="{active:pane.selected}">' +
              '<a href="" ng-click="select(pane)">{{pane.title}}</a>' +
            '</li>' +
          '</ul>' +
        '<div class="tab-content" ng-transclude></div>' +
      '</div>'
  };
});

app.directive('pane', function() {
  return {
    require: '^tabs',
    restrict: 'A',
    transclude: true,
    scope: {
      title: '@'
    },
    link: function(scope, element, attrs, tabsCtrl) {
      tabsCtrl.addPane(scope);
    },
    template: '<div class="tab-pane" ng-show="selected" ng-transclude> </div>'
  };
});