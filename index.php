
<?php
ob_start();
require "core/Autoload.php";
new core\Autoload;

require "core/bootstrap.php";

use core\{Router, Request};

Router::load('app/routes.php')->direct(Request::uri(),Request::method());


?>

