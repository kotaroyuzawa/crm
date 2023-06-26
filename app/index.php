<?php

use App\Inc\App;
use App\Inc\Frame;
use App\Customers\CustomerController;

require_once 'autoloader.php';
require_once 'config.php';

$app = new App();

/* placeholder
$app->addRoute('URL', 'METHOD', function() {

});
*/

$app->addRoute('/positions', 'GET', function() {

    $offerId = 1;
    $positionController = new \App\Positions\PositionController();
    $content = $positionController->showPositionsByOffer($offerId);

    $modal = new \App\Inc\View('positions/modal');
    $content .= $modal->render([]);

    Frame::addJsFile('jquery.js');
    Frame::addJsFile('positions.js');
    echo Frame::render($content);
});

$app->addRoute('/positions/save', 'POST', function() {

    $positionController = new \App\Positions\PositionController();

    echo $positionController->savePosition();
});

$app->addRoute('/positions/delete', 'POST', function() {

    $positionController = new \App\Positions\PositionController();

    echo $positionController->deletePosition();
});

$app->addRoute('/offers', 'GET', function() {
    (new \App\Offers\OffersController())->render();
});

$app->addRoute('/customers', 'GET', function () {
    echo "test";
    (new CustomerController())->renderCustomer();
});

$app->run();
