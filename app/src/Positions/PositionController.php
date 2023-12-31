<?php

namespace App\Positions;

use App\Inc\Database;
use App\Inc\View;
use App\Offers\OfferRepository;

class PositionController {

    public function showPositionsByOffer(int $offerId):string
    {
        $positionRepo = new PositionRepository(Database::getConnection());
        $positions = $positionRepo->getPositionsByOffer($offerId);

        $positionsRenderer = new PositionRenderer();
        $positionsRenderer->addMany($positions);

        $view = new View('positions/positionList');
        return $view->render(['positionRenderer' => $positionsRenderer, 'offerId' => $offerId]);
    }

    public function savePosition()
    {
        $positionId = $_POST['position-id'] ?? null;
        $offerId = $_POST['offer-id'] ?? '';
        $name = $_POST['position-name'] ?? '';
        $details = $_POST['position-details'] ?? '';
        $price = $_POST['position-price'] ?? '';
        $amount = $_POST['position-amount'] ?? '';
        $handlecost = $_POST['handle-cost'] ?? 0;
        $profit = $_POST['position-profit'] ?? 0;
        $skonto = $_POST['skonto'] ?? 0;
        $discount = $_POST['discount'] ?? 0;

        if (empty($offerId) || empty($name) || empty($details) || empty($price) || empty($amount)) {
            return;
        }

        $position = new Position();
        $position->setPositionId($positionId);
        $position->setOfferId($offerId);
        $position->setName($name);
        $position->setDetails($details);
        $position->setPrice($price);
        $position->setAmount($amount);
        $position->setHandleCost($handlecost);
        $position->setProfit($profit);
        $position->setSkonto($skonto);
        $position->setDiscount($discount);

        $positionRepository = new PositionRepository(Database::getConnection());

        if ($position->isNew()) {
            $positionRepository->savePosition($position);
            $position->setPositionId(Database::getLastInsertId());
        } else {
            $positionRepository->updatePosition($position);
        }

        $offerRepository = new OfferRepository(Database::getConnection());
        $offerRepository->updateSum($position->getOfferId());

        return (new View('json'))->render([
            'id' => $position->getPositionId(),
            'content' => (new PositionRenderer())->renderPosition($position)
        ]);
    }

    public function deletePosition()
    {
        $positionId = $_POST['position-id'] ?? null;
        $offerId = $_POST['offer-id'] ?? '';

        if (empty($offerId) || empty($positionId)) {
            return;
        }

        $positionRepository = new PositionRepository(Database::getConnection());
        $positionRepository->deletePosition($offerId, $positionId);

        return (new View('json'))->render(['id' => $positionId]);
    }
}
