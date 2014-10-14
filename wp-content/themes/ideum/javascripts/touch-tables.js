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
