<?php include(template('partials/header')) ?>

<h2>Products</h2>
<?php foreach($products as $product): ?>
    <article class="product">
        <div class="product-name"><?= $product['name'] ?></div>
        <div class="product-price"><?= $product['formatted_price'] ?></div>
        <div class="product-add-to-cart">
            <form action="<?= $add_to_cart_url ?>" method="POST">
                <input type="hidden" name="id_product" value="<?= $product['id'] ?>">
                <input type="submit" name="add_to_cart" value="Dodaj do koszyka">
            </form>
        </div>
    </article>
<?php endforeach; ?>

<div class="pagination">
    <?php foreach($pages as $index => $page): ?>
        <a 
        class="btn <?= $index == $current_page ? 'current' : '' ?>" 
        <?php if ($index != $current_page): ?>href="<?= $page['url'] ?>" <?php endif; ?>>
            <?= $index ?>
        </a>
    <?php endforeach; ?>
</div>
<?php include(template('partials/footer')) ?>
