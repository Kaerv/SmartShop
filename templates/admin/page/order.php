<?php include(template('partials/header', true)) ?>
<h1>Order</h1>
<p>Date placed: <?= $order['date_placed'] ?></p>
<p>Total: <?= $order['total_price'] ?></p>
<h2>Products</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
<?php foreach ($order['products'] as $product): ?>
        <tr>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td><?= $product['subtotal'] ?></td>
        </tr>
<?php endforeach; ?>
</table>
<?php include(template('partials/footer', true)); ?>