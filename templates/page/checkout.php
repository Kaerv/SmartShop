<?php include(template('partials/header')) ?>

<h1>Checkout</h1>
<h3>Cart total: <?= $cart_total ?></h3>
<form action="<?= $place_order_url ?>" method="POST">
    <input type="submit" name="place_order" value="Place order">
</form>
<?php include(template('partials/footer')) ?>