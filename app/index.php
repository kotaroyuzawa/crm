<?php

use App\Inc\App;
use App\Inc\Frame;

require_once 'autoloader.php';
require_once 'config.php';

$app = new App();

/* placeholder
$app->addRoute('URL', 'METHOD', function() {

});
*/

$app->run();
