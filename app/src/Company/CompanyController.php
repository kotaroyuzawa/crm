<?php

namespace App\Company;

use App\Inc\Database;
use App\Inc\View;

class CompanyController {

    public function renderCompany($companyId, bool $edit):string
    {
        $companyRepository = new CompanyRepository(Database::getConnection());
        $company = $companyRepository->getCompany($companyId);

        if ($edit) {
            $view = new View('company/companyUpdate');
            $profile = $view->render(['companyData' => $company]);
        } else {
            $view = new View('company/companyProfile');
            $profile = $view->render(['companyData' => $company]);
        }


        $view = new View('company/main');
        return $view->render(['content' => $profile]);
    }

    public function saveCompany()
    {
        $companyName = $_POST["companyName"] ?? "";
        $companyStreet = $_POST["companyStreet"] ?? "";
        $companyStreetAdditional = $_POST["companyStreetAdditional"] ?? "";
        $companyZip = $_POST["companyZip"] ?? null;
        $companyCity = $_POST["companyCity"] ?? "";
        $companyCountry = $_POST["companyCountry"] ?? "";
        $companyEmail = $_POST["companyEmail"] ?? "";
        $companyPhone = $_POST["companyPhone"] ?? "";
        $companyDescription = $_POST["companyDescription"] ?? "";

        $company = new Company();
        $company->setCompanyName($companyName);
        $company->setCompanyStreet($companyStreet);
        $company->setCompanyStreetAdditional($companyStreetAdditional);
        $company->setCompanyZip($companyZip);
        $company->setCompanyCity($companyCity);
        $company->setCompanyCountry($companyCountry);
        $company->setCompanyEmail($companyEmail);
        $company->setCompanyPhone($companyPhone);
        $company->setCompanyDescription($companyDescription);

        $companyRepository = new CompanyRepository(Database::getConnection());
        //$companyRepository->saveCompany($company);
        $companyRepository->updateCompany($company);
    }
}