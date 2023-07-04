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

/**
 *  Customers
 */


$app->addRoute('/', 'GET', function() {

    Frame::setActiveItem(\App\Inc\Navigator::NAV_CUSTOMERS);
    echo Frame::render('content');
});

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
    $content = (new \App\Offers\OffersController())->index();

    Frame::setActiveItem(\App\Inc\Navigator::NAV_OFFERS);
    Frame::addJsFile('jquery.js');
    Frame::addJsFile('jquery-ui.js');
    Frame::addJsFile('offers.js');
    Frame::addJsFile('positions.js');
    echo Frame::render($content);
});

$app->addRoute('/offers/filter', 'POST', function() {
    echo (new \App\Offers\OffersController())->getFilteredIndex();
});

$app->addRoute('/offers/details', 'GET', function() {
    $modal = new \App\Inc\View('positions/modal');

    $content = (new \App\Offers\OffersController())->details($_GET['offerID']);
    $content .= $modal->render([]);

    Frame::addJsFile('jquery.js');
    Frame::addJsFile('positions.js');
    echo Frame::render($content);
});

$app->addRoute('/offers/delete', 'POST', function() {
    $offersController = new \App\Offers\OffersController();

    echo $offersController->deleteOffer();
});

$app->addRoute('/offers/update', 'GET', function() {
    $content = (new \App\Offers\OffersController())->updateOffer($_GET['offerID']);

    Frame::addJsFile('jquery.js');
    echo Frame::render($content);
});

$app->addRoute('/offers/update', 'POST', function() {
    (new \App\Offers\OffersController())->saveChanges($_POST['offerID'], $_POST['customerID'], $_POST['status']);
});

$app->addRoute('/offers/create', 'POST', function () {
    $offersController = new \App\Offers\OffersController();
    $offersController->addOffer($_POST['customerId']);
});

$app->addRoute('/customers', 'GET', function () {

    $customerController = new CustomerController();
    $customers = $customerController->renderCustomer();
    $customerTable = new \App\Inc\View('customers/customerTable');

    $view = new \App\Inc\View('confirmModal');

    Frame::setActiveItem(\App\Inc\Navigator::NAV_CUSTOMERS);
    Frame::addCssFile('customer.css');
    Frame::addJsFile('jquery.js');
    Frame::addJsFile('customers.js');
    Frame::addJsFile('confirmModal.js');
    echo Frame::render($customerTable->render(['allCustomers' =>$customers, 'modal' => $view]));
});

$app->addRoute('/customers/add', 'GET', function() {
    $form = new \App\Inc\View('customers/addCustomer');
    echo Frame::render($form->render(['customers/addCustomer' => $form]));
});

$app->addRoute('/customers/add', 'POST', function() {
    $customerController = new CustomerController();
    $customerController->saveCustomer();
    header('Location: /customers');
});

$app->addRoute('/customers/delete', 'POST', function() {
    $customerId = $_POST['customerId'];
    $customerController = new CustomerController();
    $customerController->deleteCustomer($customerId);

    $view = new \App\Inc\View('json');
    echo $view->render(['id' => $customerId]);
});

$app->addRoute('/customers/update', 'POST', function() {
    $customerController = new CustomerController();
    $customer = $customerController->getCustomerById();
    $updateCustomer = new \App\Inc\View('customers/updateCustomer');
    echo Frame::render($updateCustomer->render(['customer' => $customer]));
});

$app->addRoute('/customers/updateSave', 'POST', function() {
    $customerController = new CustomerController();
    $customerController->updateCustomer();
    header('Location: /customers');
});

$app->addRoute('/customers/detail', 'GET', function() {
    $customerId = 1;
    $customerRepo = new \App\Customers\CustomerRepository(\App\Inc\Database::getConnection());
    $customerById = $customerRepo->getCustomerById($customerId);
    $customerDetail = new \App\Inc\View('customers/customerDetail');
    echo Frame::render($customerDetail->render(['customer' => $customerById]));
});

/*$app->addRoute('/company', 'GET', function () {
    echo (new \App\Company\CompanyController())->index();
});*/

$app->addRoute('/company', 'GET', function () {
    Frame::setActiveItem(\App\Inc\Navigator::NAV_COMPANY);
    $companyId = 1;
    $companyController = new \App\Company\CompanyController();
    $content = $companyController->renderCompany($companyId, false);

    echo Frame::render($content);
});

$app->addRoute('/company/edit', 'GET', function () {
    $companyId = 1;
    $companyController = new \App\Company\CompanyController();
    $content = $companyController->renderCompany($companyId, true);

    echo Frame::render($content);
});

$app->addRoute('/company/edit', 'POST', function () {
    $companyController = new \App\Company\CompanyController();
    $companyController->saveCompany();
    header('Location: /company');
});

$app->addRoute('/sql', 'GET', function () {

    $builder = (new \App\Inc\QueryBuilder(\App\Inc\Database::getConnection()))
        ->table('positions')
        ->select([
            'position_id AS positionId',
            'offer_id AS offerId',
            'name',
            'details',
            'price',
            'amount'
        ])
        ->addWhere('offer_id = ?', [2]);

    $result = $builder
        ->addWhere('price >= ?', [500])
        ->getObjects(\App\Positions\Position::class);

    var_dump($result);
});


$app->run();
