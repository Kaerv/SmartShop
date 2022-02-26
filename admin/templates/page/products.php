<?php include(template('partials/header', true)) ?>
<h1>Products panel</h1>
<h2>New product</h2>
<form action="<?= $products_url ?>" method="POST">
    <p>
        <label>Product name</label> <br>
        <input type="text" name="product_name">
    </p>
    <p>
        <label>Product price</label> <br>
        <input type="number" name="product_price" step="0.0001">
    </p>
    <p>
        <input type="submit" name="add_product" value="Add product">
    </p>
</form>
<h2>Products list</h2>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Delete</td>
        </tr>
    </thead>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getPrice() ?></td>
            <td><a href=""></a></td>
            <td>
                <form action="<?= $products_url ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?= $product->getId() ?>">
                    <input type="submit" name="delete_product" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include(template('partials/footer', true)); ?>