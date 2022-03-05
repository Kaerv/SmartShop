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
            background-color: #2c313a;
            color: #FFF;
            font-family: Nunito;
        }

        input {
            outline: none;
            border: solid 2px #6d737e;
            border-radius: 2px;
            padding: 4px 2px;
        }

        input[type=button], input[type=submit], button, a.btn {
            padding: 4px 6px;
            border: solid 2px #6d737e;
            cursor: pointer;
            border-radius: 4px;
            transition: opacity 150ms ease 0s;
            background-color: #39404e;
            text-decoration: none;
            display: inline-block;
        }

        input[type=button]:hover, input[type=submit]:hover, button:hover, a.btn:hover:not(.current) {
            opacity: 0.8;
        }

        .btn.current {
            color: #999;
        }

        table {
            border-collapse: collapse;
        }

        tr {
            border-bottom: solid 1px white;
        }

        td, th {
            padding: 6px 12px;
        }
    </style>
</head>
<body>
<nav>
    <span><a href="<?= $orders_url ?>">Orders</a></span>
    <span><a href="<?= $products_url ?>">Products</a></span>
</nav>
<p></p>