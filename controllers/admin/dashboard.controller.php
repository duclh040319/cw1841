<?php

require_once __DIR__ . "/../../services/film.service.php";
require_once __DIR__ . "/../../services/review.service.php";
require_once __DIR__ . "/../../services/user.service.php";

function dashboardPageAdmin()
{
    try {

        $header = "Dashboard";
        $films = getAllFilmsService();
        $users = getAllUserService();
        $reviews = getAllReviewsService();

        ob_start();
        include __DIR__ . "/../../views/pages/admin/dashboard.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
