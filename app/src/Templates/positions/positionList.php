<?php
    /**
     * @var \App\Positions\PositionRenderer $positionRenderer
     * @var int $offerId
     */
?>
<div class="container-fluid">
    <div id="position-list">
        <?= $positionRenderer->renderList() ?>
    </div>
    <div class="mt-2">
        <button class="btn btn-primary new-position" type="button" data-offer="<?= $offerId ?>">Neue Position</button>
    </div>
</div>
