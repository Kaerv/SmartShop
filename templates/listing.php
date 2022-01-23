<?php ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartShop</title>
</head>
<body>
    <article class="product">
        <div class="product-name">Produk 1</div>
        <div class="product-price">12,34 zł</div>
        <div class="product-add-to-cart">
            <form action="<?= $add_to_cart_url ?>" method="POST">
                <input type="hidden" name="id_product" value="1">
                <input type="submit" name="add-to-cart" value="Dodaj do koszyka">
            </form>
        </div>
    </article>
</body>
</html>