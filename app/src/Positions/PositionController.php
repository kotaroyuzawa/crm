<?php

namespace App\Positions;

use App\Inc\Database;
use App\Inc\View;

class PositionController {

    public function showPositionsByOffer(int $offerId):string
    {
        $positionRepo = new PositionRepository(Database::getConnection());
        $positions = $positionRepo->getPositionsByOffer($offerId);

        $positionsRenderer = new PositionRenderer();
        $positionsRenderer->addMany($positions);

        $renderedPositions = $positionsRenderer->getRenderedPositions();

        $view = new View('positions/positionList');
        return $view->render(['positions' => $renderedPositions, 'offerId' => $offerId]);
    }

    public function savePosition()
    {
        $offerId = $_POST['offer-id'] ?? '';
        $name = $_POST['position-name'] ?? '';
        $details = $_POST['position-details'] ?? '';
        $price = $_POST['position-price'] ?? '';
        $amount = $_POST['position-amount'] ?? '';

        if (empty($offerId) || empty($name) || empty($details) || empty($price) || empty($amount)) {
            return;
        }

        $position = new Position();
        $position->setOfferId($offerId);
        $position->setName($name);
        $position->setDetails($details);
        $position->setPrice($price);
        $position->setAmount($amount);

        $positionRepository = new PositionRepository(Database::getConnection());

        if ($position->isNew()) {
            $positionRepository->savePosition($position);
        }

    }
}
