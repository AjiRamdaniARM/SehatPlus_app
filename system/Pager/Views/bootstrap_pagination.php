<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2); // Menampilkan 2 angka sebelum & setelah halaman aktif
?>

<nav>
    <ul class="pagination justify-content-center">
        <!-- Tombol First -->
        <li class="page-item <?= $pager->hasPrevious() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
                <span aria-hidden="true">&laquo;&laquo; First</span>
            </a>
        </li>

        <!-- Tombol Previous -->
        <li class="page-item <?= $pager->hasPrevious() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo; Prev</span>
            </a>
        </li>

        <!-- Nomor Halaman -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Tombol Next -->
        <li class="page-item <?= $pager->hasNext() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
                <span aria-hidden="true">Next &raquo;</span>
            </a>
        </li>

        <!-- Tombol Last -->
        <li class="page-item <?= $pager->hasNext() ? '' : 'disabled' ?>">
            <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
                <span aria-hidden="true">Last &raquo;&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
