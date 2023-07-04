<?php

namespace App\Offers;

use App\Company\CompanyRepository;
use App\Customers\Customer;
use App\Customers\CustomerRepository;
use App\Inc\Database;
use App\Inc\View;
use App\Positions\PositionRenderer;
use App\Positions\PositionRepository;

class OffersController
{
    public function index(): string
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $customerRepository = new CustomerRepository(Database::getConnection());

        $customers = $customerRepository->getAllCustomers();

        $offers = $this->mapCustomers($offerRepository->getOffers(), $customers);

        $filterFields = (new View('offers/offersFilter'))->render(['customers' => $customers]);

        $table = new OffersTable();
        $table->addMany($offers);

        $view = new View('offers/offersTable');
        return $view->render(['filters' => $filterFields, 'table' => $table]);
    }

    public function getFilteredIndex(): string
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $customerRepository = new CustomerRepository(Database::getConnection());

        $offerRepository->initQueryBuilder();

        $filterGroup = new \App\Offers\FilterGroup();
        foreach ($filterGroup->getFilters() as $filter) {
            $offerRepository->setFilter($filter);
        }

        $offers = $this->mapCustomers($offerRepository->getObjects(), $customerRepository->getAllCustomers());

        $table = new OffersTable();
        $table->addMany($offers);

        $view = new View('json');
        return $view->render(['table' => $table->render()]);
    }

    public function details(int $offerId): string
    {
        $offer = $this->getOffer($offerId);

        $positionRenderer = new PositionRenderer();
        $positionRenderer->addMany($offer->getPositions());

        $view = new View('company/companyDetail');
        $companyInfo = $view->render(['company' => $offer->getCompany()]);
        $view = new View('customers/customerDetail');
        $customerInfo = $view->render(['customer'=>$offer->getCustomer()]);
        $view = new View('offers/offersDetails');
        return $view->render([
            'offer' => $offer,
            'companyInfo' => $companyInfo,
            'customerInfo' => $customerInfo,
            'positionRenderer' => $positionRenderer
        ]);
    }

    public function deleteOffer()
    {
        if(!empty($_POST['deleteOffer'])){
            $offerRepository = new OfferRepository(Database::getConnection());
            $offerRepository->deleteOffer($_POST['deleteOffer']);
        }
        return header('Location: /offers');
    }

    public function updateOffer(int $offerID): string
    {
        $offer = $this->getOffer($offerID);
        $customerRepository = new CustomerRepository(Database::getConnection());

        $view = new View('offers/offersUpdate');

        return $view->render(['offer' => $offer, 'customers' => $customerRepository->getAllCustomers()]);
    }

    public function saveChanges(int $offerId, int $customerId, string $status): void
    {
        $offer = $this->getOffer($offerId);

        if ($customerId != $offer->getCustomerId()) {
            $offer->setCustomerId($customerId);
        }

        if ($status != $offer->getStatus()) {
            $offer->setStatus($status);
        }

        (new OfferRepository(Database::getConnection()))->updateOffer($offer);

        header('Location: /offers/details?offerID=' . $offer->getOfferId());
    }

    private function mapCustomers(array $offers, array $customers): array
    {
        $customersMap = [];

        foreach ($customers as $entry){
            $customersMap[$entry->getCustomerId()] = $entry;
        }

        foreach ($offers as $offer){
            $offer->setCustomer($customersMap[$offer->getCustomerId()]);
        }

        return $offers;
    }

    private function getOffer(int $offerId): Offer
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $customerRepository = new CustomerRepository(Database::getConnection());
        $companyRepository = new CompanyRepository(Database::getConnection());
        $positionRepository = new PositionRepository(Database::getConnection());

        $offer = $offerRepository->getOfferById($offerId);
        $offer->setCustomer($customerRepository->getCustomerById($offer->getCustomerId()));
        $offer->setCompany($companyRepository->getCompany(COMPANY_ID));
        $offer->setOfferPositions($positionRepository->getPositionsByOffer($offer->getOfferId()));

        return $offer;
    }
}