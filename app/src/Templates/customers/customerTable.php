<form action="/customers/delete" method="post">
<input type="submit" value="Delete">
<input type="submit" formaction="customers/update" value="Update">
<table class="table table-sm">
    <thead>
    <tr>
        <th scope="col">Select</th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allCustomers as $customer) : ?>
    <tr>
        <th><input type="radio" name="customerId" value="<?php echo $customer->getCustomerId() ;?>" required></th>
        <th scope="row"><?php echo $customer->getCustomerId() ?></th>
        <td><?php echo $customer->getCustomerName() ?></td>
        <td><?php echo $customer->getCustomerStreet() . $customer->getCustomerStreetNr() . " ".$customer->getCustomerStreetAdditional() . ", " . $customer->getCustomerZip() . " " . $customer->getCustomerCity() ?></td>
        <td><?php echo $customer->getCustomerEmail() ?></td>
        <td><?php echo $customer->getCustomerPhone() ?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</form>