<div>
    <p>
        <?php echo $customer->getCustomerName()?>  <br>
        <?php echo $customer->getCustomerStreet() . ', ' . $customer->getCustomerStreetNr() .   " " . $customer->getCustomerStreetAdditional() ?> <br>
        <?php echo $customer->getCustomerZip() . ' ' . $customer->getCustomerCity()?>
    </p>
</div>