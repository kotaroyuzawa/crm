<?php
/**
 * @var string $filters;
 * @var \App\Offers\OffersTable $table
 */
?>
<div class="container-fluid">
    <?= $filters ?>
    <div class="row">
        <div id="offers-table">
            <?= $table->render() ?>
        </div>
    </div>
</div>
-