<?php

use App\Inc\App;
use App\inc\Offers\OffersView;

require_once 'autoloader.php';
require_once 'config.php';

$app = new App();


/* placeholder
$app->addRoute('URL', 'METHOD', function() {

});
*/

$app->addRoute('/offers', 'GET', function() {

    echo 123455;
    echo (new OffersView())->render();

});



$app->run();

