<form action="/customers/delete" method="post">
<input type="submit" value="Delete">
<input type="submit" formaction="customers/update" value="Update">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Customer Select</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Street</th>
        <th scope="col">Customer City</th>
        <th scope="col">Customer Email</th>
        <th scope="col">Customer Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allCustomers as $customer) : ?>
    <tr>
        <th><input type="radio" name="customerId" value="<?php echo $customer['customerId'] ;?>" required></th>
        <th scope="row"><?php echo $customer['customerId'] ?></th>
        <td><?php echo $customer['customerName'] ?></td>
        <td><?php echo $customer['customerStreet'] . $customer['customerStreetNr'] . $customer['customerStreetAdditional'] ?></td>
        <td><?php echo $customer['customerCity'] ?></td>
        <td><?php echo $customer['customerEmail'] ?></td>
        <td><?php echo $customer['customerPhone'] ?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
</form>