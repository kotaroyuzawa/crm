<?php

namespace App\Customers;
use App\Inc\Database;

class CustomerController
{
        public function __construct() {

        }

    public function renderCustomer(){
        var_dump((new CustomerRepository(Database::getConnection()))->getAllCustomers());
    }

    public function saveCustomer()
    {
        $customerId = $_POST['customerId'];
        $customerName = $_POST['customerName'];
        $customerStreet = $_POST['customerStreet'];
        $customerStreetNr = $_POST['customerStreetNr'];
        $customerStreetAdditional = $_POST['customerStreetAdditional'];
        $customerCity = $_POST['customerCity'];
        $customerEmail =$_POST['customerEmail'];
        $customerPhone = $_POST['customerPhone'];

        $customer = new Customer();
        $customer->setCustomerId($customerId);
        $customer->setCustomerName($customerName);
        $customer->setCustomerStreet($customerStreet);
        $customer->setCustomerStreetNr($customerStreetNr);
        $customer->setCustomerStreetAdditional($customerStreetAdditional);
        $customer->setCustomerCity($customerCity);
        $customer->setCustomerEmail($customerEmail);
        $customer->setCustomerPhone($customerPhone);
        
        $customerRepo = new CustomerRepository();
        $customerRepo->saveCustomer($customer);
     }




}