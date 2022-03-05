<?php include(template('partials/header', true)) ?>
<h1>Products panel</h1>
<a class="btn" href="<?= $new_product_url ?>">Add new product</a>
<h2>Products list</h2>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['formatted_price'] ?></td>
            <td><a class="btn" href="<?= $product['edit_url'] ?>">Edit</a></td>
            <td>
                <form action="<?= $products_url ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?= $product['id'] ?>">
                    <input type="submit" name="delete_product" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include(template('partials/footer', true)); ?>