<?php

namespace App\Company;

use App\Inc\Database;

class CompanyController {

    public function index():string
    {
        $companyRepository = new CompanyRepository(Database::getConnection());
        $company = $companyRepository->get();

        var_dump($company);
        die();
    }
}
