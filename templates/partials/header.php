<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartShop</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
        * {
            background-color: #333;
            color: #FFF;
            font-family: 'Nunito';
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
    <nav>
        <a href="<?= $nav_listing_url ?>">Products</a>
        <a href="<?= $nav_cart_url ?>">Cart</a>
    </nav>
    <?php hook('header') ?>