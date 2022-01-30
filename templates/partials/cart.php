<h2>Cart</h2>
<table>
    <?php foreach($cart_content as $row): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['quantity'] ?> szt.</td>
            <td>
                <form action="<?= $cart_url ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?= $row['id_product'] ?>">
                    <input type="submit" name="remove_from_cart" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p></p>