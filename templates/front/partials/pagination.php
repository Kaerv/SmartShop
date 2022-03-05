<?php if (count($pages) > 1): ?>
<div class="pagination">
    <?php foreach($pages as $index => $page): ?>
        <a 
        class="btn <?= $index == $current_page ? 'current' : '' ?>" 
        <?php if ($index != $current_page): ?>href="<?= $page['url'] ?>" <?php endif; ?>>
            <?= $index ?>
        </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>