import angular from 'angular';

import adminSidebar from './admin-sidebar.directive';
import adminSidebarCtrl from './admin-sidebar.controller';

export default angular.module('app.admin.sidebar', [])
  .directive('adminSidebar', adminSidebar)
  .controller('adminSidebarCtrl', adminSidebarCtrl)
  .name