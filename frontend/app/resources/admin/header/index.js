import angular from 'angular';

import adminHeader from './admin-header.component';

export default angular.module('app.admin.header', [])
  .component('adminHeader', adminHeader)
  .name