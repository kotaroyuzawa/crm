<?php

namespace App\Positions;

use App\Inc\Database;
use App\Inc\View;

class PositionController {

    public function showPositionsByOffer(int $offerId):string
    {
        $positionRepo = new PositionRepository(Database::getConnection());
        $positions = $positionRepo->getPositionsByOffer($offerId);

        $view = new View('positions/positionList');
        return $view->render(['positions' => $positions]);
    }
}
