'use strict';

//= require jquery
//= require select2
//= require angular/angular
//= require angular/angular-animate
//= require angular/angular-touch
//
//= require angular-carousel
//= require angular-ui-select2

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
