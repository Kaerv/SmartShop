<?php include(template('partials/header', true)) ?>
<h1>Products panel</h1>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
        </tr>
    </thead>
    <?php foreach($products as $product): ?>
        <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include(template('partials/footer', true)); ?>