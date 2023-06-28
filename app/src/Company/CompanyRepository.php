<?php

namespace App\Company;

use App\Inc\AbstractRepository;
use \PDO;

class CompanyRepository extends AbstractRepository {

    public function get()
    {
        $stmt = $this->pdo->prepare('
            SELECT
                name AS companyName,
                street AS companyStreet,
                number AS streetNumber,
                street-additional AS companyStreetAdditional,
                zip AS companyZip,
                city AS companyCity,
                email AS companyEmail,
                phone AS companyPhone,
                description AS companyDescription
            FROM
                companies
            WHERE
                company_id = 1
        ');
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Company::class);
    }

    public function saveCompany($company)
    {
        $stmt = $this->pdo->prepare('
                update company set 
                    name = ?, 
                    street = ?,
                    number = ?,
                    street-additional = ?,
                    zip = ?,
                    city = ?,
                    email = ?,
                    phone = ?,
                    description = ?                    
                where 
                    id = 1
                IF @@ROWCOUNT = 0
                   insert into company(name, street, number, street-additional, zip, city, email, phone, description) 
                          values(?, ?, ?, ?, ?, ?, ?, ?, ?);'
        );

        $stmt->execute([
            $company->getCompanyName(),
            $company->getCompanyStreet(),
            $company->getStreetNumber(),
            $company->getCompanyStreetAdditional(),
            $company->getCompanyZip(),
            $company->getCompanyCity(),
            $company->getCompanyEmail(),
            $company->getCompanyPhone(),
            $company->getCompanyPhone()
        ]);
    }
}
