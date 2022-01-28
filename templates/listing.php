<?php ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartShop</title>
    <style>
        * {
            background-color: #333;
            color: #FFF;
        }

        input[type=button], input[type=submit], button {
            outline: none;
            padding: 4px 6px;
            border: solid 2px #555;
            cursor: pointer;
            border-radius: 4px;
            transition: opacity 150ms ease 0s;
        }

        input[type=button]:hover, input[type=submit]:hover, button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <?php foreach($products as $product): ?>
        <article class="product">
            <div class="product-name"><?= $product->name ?></div>
            <div class="product-price"><?= $product->price ?> zł</div>
            <div class="product-add-to-cart">
                <form action="<?= $add_to_cart_url ?>" method="POST">
                    <input type="hidden" name="id_product" value="1">
                    <input type="submit" name="add-to-cart" value="Dodaj do koszyka">
                </form>
            </div>
        </article>
    <?php endforeach; ?>
</body>
</html>