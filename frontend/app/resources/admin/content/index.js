import angular from 'angular';

import adminContent from './admin-content.directive';
import adminContentCtrl from './admin-content.controller';

export default angular.module('app.admin.content', [])
  .directive('adminContent', adminContent)
  .controller('adminContentCtrl', adminContentCtrl)
  .name