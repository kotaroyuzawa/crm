<?php

namespace App\Customers;

use App\Inc\AbstractRepository;
use PDO;
class CustomerRepository extends AbstractRepository
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllCustomers(): array
    {
        try {
            $sql = 'SELECT * FROM customers';
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $stm->fetchAll();
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }

    }

    public function saveCustomer(Customer $customer): void
    {
        try {
            $sql = 'INSERT INTO customerds (customerId, customerName, customerStreet, 
                        customerStreetNr, customerCity, customerEmail, customerPhone) 
                    VALUES (null, :customerId, :customerName, :customerStreet, 
                        :customerStreetNr, :customerCity, :customerEmail, :customerPhone)';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $customer->getCustomerId(),
                $customer->getCustomerName(),
                $customer->getCustomerStreet(),
                $customer->getCustomerStreetNr(),
                $customer->getCustomerStreetAdditional(),
                $customer->getCustomerCity(),
                $customer->getCustomerEmail(),
                $customer->getCustomerPhone()
            ]);

        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }


}