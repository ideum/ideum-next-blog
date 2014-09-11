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
