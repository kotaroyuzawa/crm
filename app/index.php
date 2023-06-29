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
    Frame::addJsFile('positions.js');
    echo Frame::render($content);
});

$app->addRoute('/offers/details', 'POST', function() {
    $modal = new \App\Inc\View('positions/modal');
    $content = (new \App\Offers\OffersController())->details();
    $content .= $modal->render([]);



    Frame::addJsFile('jquery.js');
    Frame::addJsFile('positions.js');
    echo Frame::render($content);
});



$app->addRoute('/customers', 'GET', function () {

    $customerController = new CustomerController();
    $customers = $customerController->renderCustomer();
    $customerTable = new \App\Inc\View('customers/customerTable');
//    Frame::addCssFile('customer.css');
    Frame::setActiveItem(\App\Inc\Navigator::NAV_CUSTOMERS);
    echo Frame::render($customerTable->render(['allCustomers' =>$customers]));
    //require_once '/crm/app/src/Templates/customers/customerTable.php';
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
    $customerController = new CustomerController();
    $customerController->deleteCustomer();
    header('Location: /customers');
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

$app->addRoute('/company', 'GET', function () {
    echo (new \App\Company\CompanyController())->index();
});

$app->addRoute('/company/save', 'POST', function () {
    $companyController = new \App\Company\CompanyController();
    $companyController->saveCompany();
});

$app->run();
