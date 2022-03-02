<?php include(template('partials/header')) ?>
<h2>Cart</h2>
<table>
    <?php foreach($cart_content as $row): ?>
        <tr>
            <td><?= $row->getProductName() ?></td>
            <td><?= $row->getFormattedPrice() ?></td>
            <td>
                <form action="<?= $cart_url ?>" method="POST">
                    <input type="number" value="<?= $row->getQuantity() ?>" name="quantity">
                    <input type="hidden" name="id_product" value="<?= $row->getIdProduct() ?>">
                    <input type="submit" name="update_quantity" value="Update">
                </form>
            </td>
            <td>
                <?= $row->getFormattedSubtotal() ?>
            </td>
            <td>
                <form action="<?= $cart_url ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?= $row->getIdProduct() ?>">
                    <input type="submit" name="remove_from_cart" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<h2>Total</h2>
<h3><?= $cart_total ?></h3>
<a href="<?= $checkout_url ?>">Go to checkout</a>
<?php include(template('partials/footer')) ?>