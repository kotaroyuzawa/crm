<?php
/**
 * @var \App\Company\Company $company
 */
?>
<div>
    <p>
        <?php echo $company->getCompanyName() ?>  <br>
        <?php echo  $company->getCompanyStreet() ?> <br>
        <?php echo  $company->getCompanyZip(). ' ' . $company->getCompanyCity()?>
    </p>
</div>