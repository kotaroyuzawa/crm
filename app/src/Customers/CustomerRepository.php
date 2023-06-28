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

    public function getCustomerById($customerId): array
    {
        try {
            $sql = 'SELECT * FROM customers WHERE customerId = :customerId';
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':customerId',$customerId );
            $stm->execute();
            return $stm->fetch();
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    public function saveCustomer(Customer $customer): int
    {
        try {
            $sql = 'INSERT INTO customers (customerId, customerName, customerStreet, 
                        customerStreetNr, customerStreetAdditional, customerCity, customerEmail, customerPhone) 
                    VALUES (null, ?, ?, ?, ?, ?, ?, ?)';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $customer->getCustomerName(),
                $customer->getCustomerStreet(),
                $customer->getCustomerStreetNr(),
                $customer->getCustomerStreetAdditional(),
                $customer->getCustomerCity(),
                $customer->getCustomerEmail(),
                $customer->getCustomerPhone()
            ]);
            return $lastCustomerId = $this->pdo->lastInsertId();

        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }


    public function deleteCustomer($customerId): void
    {
        try {
            $sql = 'DELETE FROM customers WHERE customerId = :customerId';
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':customerId', $customerId);
            $stm->execute();
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    public function updateCustomer(Customer $customer): void
    {
        try {
            $sql = 'UPDATE customers SET customerName = ?, customerStreet = ?, 
                        customerStreetNr = ?, customerStreetAdditional = ?, customerCity = ?, customerEmail = ?, customerPhone = ?
                        WHERE customerId = ?';

            $stm = $this->pdo->prepare($sql);
            $stm->execute([
                $customer->getCustomerName(),
                $customer->getCustomerStreet(),
                $customer->getCustomerStreetNr(),
                $customer->getCustomerStreetAdditional(),
                $customer->getCustomerCity(),
                $customer->getCustomerEmail(),
                $customer->getCustomerPhone(),
                $customer->getCustomerId()
            ]);

        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }


}