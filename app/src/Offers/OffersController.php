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
    //private OfferRepository $offerRepository;
   // private PositionRepository $positionRepository;

    public function __construct()
    {

    }


    public function addPositions()
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $positionRepository = new PositionRepository(Database::getConnection());
        foreach ($offerRepository->getOffers() as $offer){
            $offer->setOfferPositions($positionRepository->getPositionsByOffer($offer->getOfferId()));
        }
    }

    public function index(): string
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $customerRepostitory = new CustomerRepository(Database::getConnection());
        $companyRepository = new CompanyRepository(Database::getConnection());

        $entries = $customerRepostitory->getAllCustomers();
        $customers = [];

        foreach ($entries as $entry){
            $customers[$entry->getCustomerId()] = $entry;
        }


        /**
         * @var Offer $offer
         */
        $offers = $offerRepository->getOffers();

        foreach ($offers as $offer){
            $offer->setCustomer($customers[$offer->getCustomerId()]);
        }

        $filterFields = (new View('offers/offersFilter'))->render(['customers' => $customers]);

        $view = new View('offers/offersTable');
        return $view->render(['offers' => $offers, 'filters' => $filterFields]);
    }

    public function getFilteredIndex()
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $offerRepository->initQueryBuilder();

        $filterGroup = new \App\Offers\FilterGroup();
        foreach ($filterGroup->getFilters() as $filter) {
            $offerRepository->setFilter($filter);
        }

        $offers = $offerRepository->getObjects();

        $customer = new Customer();
        $customer->setCustomerName('Klaus Dieter');
        foreach ($offers as $offer){
            $offer->setCustomer($customer);
        }

        $view = new View('offers/offersTable');
        return $view->render(['offers' => $offers, 'filters' => '']);
    }

    public function details(): string
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $customerRepository = new CustomerRepository(Database::getConnection());
        $positionRepository = new PositionRepository(Database::getConnection());
        $positionRenderer = new PositionRenderer();


        $offer = $offerRepository->getOfferById($_POST['offerID']);
        $customer = $customerRepository->getCustomerById($offer->getCustomerId());
        $offer->setCustomer($customer);
        $positions = $positionRepository->getPositionsByOffer($offer->getOfferId());

        $positionRenderer->addMany($positions);

        $view = new View('customers/customerDetail');
        $customerInfo = $view->render(['customer'=>$offer->getCustomer()]);
        $view = new View('offers/offersDetails');
        return $view->render(['offer' => $offer, 'customerInfo' => $customerInfo, 'positionRenderer' => $positionRenderer]);
    }

    public function deleteOffer()
    {
        if(!empty($_POST['deleteOffer'])){
            $offerRepository = new OfferRepository(Database::getConnection());
            $offerRepository->deleteOffer($_POST['deleteOffer']);
        }
        return header('Location: /offers');
    }

    public function saveOffer()
    {
        return header('Location: /offers');
    }



    public function setCompany()
    {

    }

    public function setCustomer()
    {

    }

    public function getOfferRepo()
    {
       // return $this->offerRepository;
    }




    //TODO hier sachen aus dem Repository aufrufen und bearbeiten. Daten vorbereiten für OffersRenderer



}