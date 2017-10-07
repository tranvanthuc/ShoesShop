/* Global import */
window.Tether = require('tether');
window.$ = window.jQuery = require('jquery');
require('bootstrap');

/* App */
import angular from 'angular';
import uirouter from 'angular-ui-router';

import routes from './app.routes';

angular.module('app', [
  uirouter,
])
  .config(routes)
