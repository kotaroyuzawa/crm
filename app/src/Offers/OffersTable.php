<?php

namespace App\Offers;

use App\Inc\View;

class OffersTable {

    private array $offers;

    public function addMany(array $offers): void
    {
        $this->offers = $offers;
    }

    public function render():string
    {
        $view = new View('offers/table');
        return $view->render(['offers' => $this->offers]);
    }
}