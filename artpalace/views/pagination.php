<ul class="pagination justify-content-center">
    <?php
    $param = "";
    global $s;
    if($s){
        $param = "txtsearch=".$s."&";
    }
        if ($current_page > 3) {
            $first_page = 1;
            ?>
            <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $first_page ?>">First</a></li>
            <?php
        }
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
            ?>
            <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $prev_page ?>">Previous</a></li>
        <?php 
        }
        ?>

        <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
            <?php if ($num != $current_page) { ?>
                <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                    <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
                <?php } ?>
            <?php } else { ?>
                <li class="page-item active"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
            <?php } ?>
        <?php } ?>

        <?php
        if ($current_page < $totalPages - 1) {
            $next_page = $current_page + 1;
            ?>
            <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $next_page ?>">Next</a></li>
        <?php
        }
        if ($current_page < $totalPages - 3) {
            $end_page = $totalPages;
            ?>
            <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $end_page ?>">Last</a></li>
            <?php
        }
    ?> 
</ul>