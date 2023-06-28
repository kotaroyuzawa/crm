<?php

namespace App\Company;

use App\Inc\Database;
use App\Inc\View;

class CompanyController {

    public function showCompany($companyId):string
    {
        $companyRepository = new CompanyRepository(Database::getConnection());
        $company = $companyRepository->getCompany($companyId);

        $view = new View('company');
        return $view->render(['company' => $company]);
    }

    public function saveCompany()
    {
        $companyName = $_POST["companyName"] ?? "";
        $companyStreet = $_POST["companyStreet"] ?? "";
        $streetNumber = $_POST["streetNumber"] ?? "";
        $companyStreetAdditional = $_POST["companyStreetAdditional"] ?? "";
        $companyZip = $_POST["companyZip"] ?? "";
        $companyCity = $_POST["companyCity"] ?? "";
        $companyEmail = $_POST["companyEmail"] ?? "";
        $companyPhone = $_POST["companyPhone"] ?? "";
        $companyDescription = $_POST["companyDescription"] ?? "";

        $company = new Company();
        $company->setCompanyName($companyName);
        $company->setCompanyStreet($companyStreet);
        $company->setStreetNumber($streetNumber);
        $company->setCompanyStreetAdditional($companyStreetAdditional);
        $company->setCompanyZip($companyZip);
        $company->setCompanyCity($companyCity);
        $company->setCompanyEmail($companyEmail);
        $company->setCompanyPhone($companyPhone);
        $company->setCompanyDescription($companyDescription);

        $companyRepository = new CompanyRepository(Database::getConnection());
        $companyRepository->saveCompany($company);
    }
}