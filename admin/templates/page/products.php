<?php include(template('partials/header', true)) ?>
<nav>
    <span>Orders</span>
<span>Products</span>
</nav>
<p></p>
<table>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include(template('partials/footer', true)); ?>