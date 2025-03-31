
<?php if ($pager->hasPrevious() || $pager->hasNext()) : ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pager->hasPrevious()) : ?>
                <li class="page-item">
                    <a href="<?= $pager->getFirst() ?>" class="page-link">First</a>
                </li>
                <li class="page-item">
                    <a href="<?= $pager->getPrevious() ?>" class="page-link">Previous</a>
                </li>
            <?php endif; ?>

            <?php foreach ($pager->links() as $link) : ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
                </li>
            <?php endforeach; ?>

            <?php if ($pager->hasNext()) : ?>
                <li class="page-item">
                    <a href="<?= $pager->getNext() ?>" class="page-link">Next</a>
                </li>
                <li class="page-item">
                    <a href="<?= $pager->getLast() ?>" class="page-link">Last</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
