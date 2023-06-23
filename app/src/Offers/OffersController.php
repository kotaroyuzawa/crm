<?php

namespace App\Offers;

use App\Offers\OfferRepository;
use App\Inc\Database;

class OffersController
{

    public function __construct()
    {

    }

    public function renderOffers(){
        var_dump((new OfferRepository(Database::getConnection()))->getOffers());
    }

}