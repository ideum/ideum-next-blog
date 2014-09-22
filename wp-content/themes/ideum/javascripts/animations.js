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
