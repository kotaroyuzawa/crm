<?php

namespace App\Inc\Offers;

/**
 * This is a dummy class for study popuses
 */

class OffersView extends Offer

{

    public function render(): string
    {
        return "<h1>HALLO AUS OffersView</h1>";
    }

    public function CargoType(): string
    {
        return "";
    }



}