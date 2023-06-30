<?php

namespace App\Company;

use App\Inc\AbstractRepository;
use \PDO;

class CompanyRepository extends AbstractRepository {

    public function getCompany($companyId)
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                 `company_id` AS companyId,
                 `name` AS companyName,
                 `street` AS companyStreet,
                 `street_additional` AS companyStreetAdditional,
                 `zip` AS companyZip,
                 `city` AS companyCity,
                 `country` AS companyCountry,
                 `email` AS companyEmail,
                 `phone` AS companyPhone,
                 `description` AS companyDescription
            FROM 
                companies
            WHERE 
                company_id = ?
        ');
        $stmt->execute([$companyId]);
        return $stmt->fetchObject(Company::class);
    }

    public function updateCompany(Company $company)
    {
        $stmt = $this->pdo->prepare('
                update companies set 
                    name = ?, 
                    street = ?,
                    street_additional = ?,
                    zip = ?,
                    city = ?,
                    country = ?,
                    email = ?,
                    phone = ?,
                    description = ?                    
                where 
                    company_id = 1'
        );

        $stmt->execute([
            $company->getCompanyName(),
            $company->getCompanyStreet(),
            $company->getCompanyStreetAdditional(),
            $company->getCompanyZip(),
            $company->getCompanyCity(),
            $company->getCompanyCountry(),
            $company->getCompanyEmail(),
            $company->getCompanyPhone(),
            $company->getCompanyDescription()
        ]);
    }

    public function saveCompany(Company $company)
    {
        $stmt = $this->pdo->prepare('
                insert into companies(name, street, street_additional, zip, city, country, email, phone, description) 
                       values(?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE company_id = 1 ;'
        );
        $stmt->execute([
            $company->getCompanyName(),
            $company->getCompanyStreet(),
            $company->getCompanyStreetAdditional(),
            $company->getCompanyZip(),
            $company->getCompanyCity(),
            $company->getCompanyCountry(),
            $company->getCompanyEmail(),
            $company->getCompanyPhone(),
            $company->getCompanyDescription()
        ]);
    }
}
