<?php
/**
 * @var string $content
 */
?>
<div class="container">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item pe-2">
                    <a id="profile" class="btn btn-outline-primary" href="company">Profil</a>
                </li>
                <li class="nav-item">
                    <a id="profileEdit" class="btn btn-outline-primary" href="company/edit">Profil bearbeiten</a>
                </li>
            </ul>
        </nav>
    </div>
    <?= $content ?>
</div>