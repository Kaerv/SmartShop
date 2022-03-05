<?php include(template('partials/header', true)) ?>

<h1><?= $action == 'edit' ? "Edit" : "Add" ?> product</h1>

<form action="<?= $form_url ?>" method="POST">
    <input type="hidden" name="product[id]" value="<?= $product['id'] ?? '' ?>">
    <p>
        <label>Product name</label>
        <input type="text" name="product[name]" value="<?= $product['name'] ?? '' ?>" required>
    </p>
    <p>
        <label>Product price</label>
        <input type="number" name="product[price]" value="<?= $product['price'] ?? '' ?>" step=0.01>
    </p>
    <p>
        <input type="submit" name="<?= $action ?>" value="Save">
    </p>
</form>

<?php include(template('partials/footer', true)); ?>