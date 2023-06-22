<?php
    /**
     * @var int $offerId
     * @var array $positions
     * @var string $position
     */
?>
<div class="container-fluid">
    <div id="position-list">
        <?php foreach ($positions as $position): ?>
            <?= $position ?>
        <?php endforeach; ?>
    </div>
    <div class="mt-2">
        <button class="btn btn-primary new-position" type="button" data-offer="<?= $offerId ?>">Neue Position</button>
    </div>
</div>
