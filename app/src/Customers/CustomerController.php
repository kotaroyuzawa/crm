<?php

namespace App\Customers;
use App\Inc\Database;
use App\Inc\View;

class CustomerController
{
    private CustomerRepository $customerRepo;
        public function __construct() {
        $this->customerRepo = new CustomerRepository(Database::getConnection());
        }

    public function renderCustomer(): mixed
    {

        return $this->customerRepo->getAllCustomers();
    }

    public function getCustomerById(): array
    {
        $customerId = $_POST['customerId'];
        return $this->customerRepo->getCustomerById($customerId);

    }

    public function saveCustomer(): void
    {

        $customerName = $_POST['customerName'];
        $customerStreet = $_POST['customerStreet'];
        $customerStreetNr = $_POST['customerStreetNr'];
        $customerStreetAdditional = $_POST['customerStreetAdditional'];
        $customerCity = $_POST['customerCity'];
        $customerEmail =$_POST['customerEmail'];
        $customerPhone = $_POST['customerPhone'];

        $customer = new Customer();
        $customer->setCustomerName($customerName);
        $customer->setCustomerStreet($customerStreet);
        $customer->setCustomerStreetNr($customerStreetNr);
        $customer->setCustomerStreetAdditional($customerStreetAdditional);
        $customer->setCustomerCity($customerCity);
        $customer->setCustomerEmail($customerEmail);
        $customer->setCustomerPhone($customerPhone);
        

        $lastCustomerId = $this->customerRepo->saveCustomer($customer);
        $customer->setCustomerId($lastCustomerId);
     }

     public function deleteCustomer(): void
     {
         $customerId = $_POST['customerId'];

         $this->customerRepo->deleteCustomer($customerId);
     }

     public function updateCustomer(): void
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

         $this->customerRepo->updateCustomer($customer);
     }



}