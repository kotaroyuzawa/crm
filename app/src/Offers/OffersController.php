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

        $offers = $offerRepository->getOffers();
        //$customer = $customerRepostitory->getCustomerById(2);
        $customer = new Customer();
        $customer->setCustomerName('Klaus Dieter');
        foreach ($offers as $offer){
            $offer->setCustomer($customer);
        }

        $view = new View('offers/offersTable');
        return $view->render(['offers' => $offers]);
    }

    public function details(): string
    {
        $offerRepository = new OfferRepository(Database::getConnection());
        $positionRepository = new PositionRepository(Database::getConnection());
        $positionRenderer = new PositionRenderer();


        $offer = $offerRepository->getOfferById($_POST['offerID']);
        $positions = $positionRepository->getPositionsByOffer($offer->getOfferId());

        $positionRenderer->addMany($positions);


        $view = new View('offers/offersDetails');
        return $view->render(['offer' => $offer, 'positionRenderer' => $positionRenderer]);
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