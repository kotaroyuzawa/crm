<?php

namespace App\Offers;
use App\Inc\Database;

class OffersController
{

    public function __construct()
    {

    }

    public function render(){
        var_dump((new OfferRepository(Database::getConnection()))->getOffers());
    }

}