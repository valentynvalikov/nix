<?php

namespace dnarna;

class Pagination
{
    public function drawPager($allPosts, $perPage)
    {
        $pages = ceil($allPosts / $perPage);

        if (!isset($_GET['url'])) {
            $pageNumber = 1;
        } elseif (preg_match('/[A-zА-я0]/', $_GET['url'])) {
            redirect('');
        } elseif (intval($_GET['url']) > $pages) {
            redirect($pages);
        } else {
            $pageNumber = intval($_GET['url']);
        }
        $pager =  "<div id='pagination'>";
        $pager .= "<ul class='pagination'>";
        $pager .= "<li class='page-item text-nowrap";
        if (empty($_GET['url']) || $_GET['url'] == 1) {
            $pager .= " disabled";
        }
        $pager .= "'><a class='page-link text-nowrap' href='" .
            $pageNumber - 1 . "'>&laquo; Prev</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            $pager .= "<li class='page-item";
            if ($i == $pageNumber) {
                $pager .= " active";
            }
            $pager .= "'><a class='page-link text-nowrap' href='" . $i . "'>" . $i . "</a></li>";
        }
        $pager .= "<li class='page-item text-nowrap";
        if (intval($_GET['url']) == $pages) {
            $pager .= " disabled";
        }
        $pager .= "'><a class='page-link text-nowrap' href='" .
            $pageNumber + 1 . "'>Next &raquo;</a></li>";
        $pager .= "</ul>";
        return $pager;
    }
}
