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
                `street-additional` AS companyStreetAdditional,
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
}
