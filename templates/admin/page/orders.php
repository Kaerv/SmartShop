<?php include(template('partials/header', true)) ?>
<h1>Orders panel</h1>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Total price</td>
            <td>Date placed</td>
            <td>View</td>
        </tr>
    </thead>
    <?php foreach($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $order['formatted_total_price'] ?></td>
            <td><?= $order['date_placed'] ?></td>
            <td><a class="btn" href="<?= $order['url'] ?>">View</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include(template('partials/footer', true)); ?>