<?php

namespace App\Company;

use App\Inc\AbstractRepository;
use \PDO;

class CompanyRepository extends AbstractRepository {

    public function getCompany(Company $company)
    {
        $stmt = $this->pdo->prepare('
            SELECT * FROM companies
            WHERE company_id = ?
        ');
        $stmt->execute([$company->getCompanyId()]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Company::class);
    }

    public function saveCompany(Company $company)
    {
        $stmt = $this->pdo->prepare('
                update companies set 
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
                   insert into companies(name, street, number, street-additional, zip, city, email, phone, description) 
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
