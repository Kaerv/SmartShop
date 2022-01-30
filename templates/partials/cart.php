<h2>Cart</h2>
<table>
    <?php foreach($cart_content as $row): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['quantity'] ?> szt.</td>
        </tr>
    <?php endforeach; ?>
</table>
<p></p>