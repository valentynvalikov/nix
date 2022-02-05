<?php
if (empty($_GET['url'])) {
    $page = 1;
} else {
    $page = $_GET['url'];
}
$pagination = new Pagination($page, 5, $data['count']['COUNT(*)']);
?>
<div id="pagination">
    <ul class="pagination">
        <?php if ($pagination->totalPages() < $page) {
            redirect($pagination->totalPages());
        } elseif ($pagination->totalPages() > 1) {
            if ($pagination->hasPreviousPage()) {
                    echo "<li class=\"page-item text-nowrap\">
                    <a class=\"page-link text-nowrap\" href=\"" . $pagination->previousPage() . "\">&laquo; Prev</a>
                </li> ";
            }
            for ($i = 1; $i <= $pagination->totalPages(); $i++) {
                    echo " <li class=\"page-item ";if ($i == $page) {
                        echo "active";
                    }
                    echo "\"><a class=\"page-link text-nowrap\" href=\"" . $i . "\">" . $i . "</a></li>";
            }
            if ($pagination->hasNextPage()) {
                    echo " <li class=\"page-item text-nowrap\">
                    <a class=\"page-link text-nowrap\" href=\"" . $pagination->nextPage() . "\">Next &raquo;</a>
                </li> ";
            }
        }
        ?>
    </ul>
</div>
