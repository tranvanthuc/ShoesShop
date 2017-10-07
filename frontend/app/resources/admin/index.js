import angular from 'angular';
import uirouter from 'angular-ui-router';

import routes from './admin.routes';
import adminHeader from './header';
import adminSidebar from './sidebar';
import adminContent from './content';

export default angular.module('app.admin', [
    uirouter,
    adminHeader,
    adminSidebar,
    adminContent
  ])
  .config(routes)
  .name