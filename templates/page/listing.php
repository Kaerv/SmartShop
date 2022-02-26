<?php include(template('partials/header')) ?>

<h2>Products</h2>
<?php foreach($products as $product): ?>
    <article class="product">
        <div class="product-name"><?= $product->getName() ?></div>
        <div class="product-price"><?= $product->getFormattedPrice() ?></div>
        <div class="product-add-to-cart">
            <form action="<?= $add_to_cart_url ?>" method="POST">
                <input type="hidden" name="id_product" value="<?= $product->getId() ?>">
                <input type="submit" name="add_to_cart" value="Dodaj do koszyka">
            </form>
        </div>
    </article>
<?php endforeach; ?>

<?php include(template('partials/footer')) ?>
