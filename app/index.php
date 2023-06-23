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

$app->addRoute('/offers', 'GET', function() {
    (new \App\Offers\OffersController())->renderOffers();
});

$app->run();
