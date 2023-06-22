<?php

namespace App\Inc\Offers;
/**
 * This is a dummy class for study popuses
 */
abstract class Offer
{
    private array $data;
    private int $offerId;
    public string $offerName;
    //private


    private function setOffer()
    {

    }

    public function getOffer(): array
    {
        return ["tst"=>"Testi"];
    }


}