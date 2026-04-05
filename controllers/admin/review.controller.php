<?php

require __DIR__ . "/../../services/review.service.php";
require __DIR__ . "/../../services/film.service.php";
require __DIR__ . "/../../services/user.service.php";

function listReviewPageAdmin()
{
    try {

        $header = "Reviews";
        $reviews = getAllReviewsService();

        ob_start();
        include __DIR__ . "/../../views/pages/admin/reviews/list.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}



function createReviewPageAdmin()
{
    try {
        $header = "Reviews";
        $films = getAllFilmsService();
        ob_start();
        include __DIR__ . "/../../views/pages/admin/reviews/create.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function createReviewAdmin()
{

    try {

        $content = $_POST["content"];
        $rating = $_POST["rating"];
        $filmId = (int) $_POST["filmId"];
        createReviewService($content, $rating, $filmId);
        header("location: admin.php?admin=1&page=reviews");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function editReviewPage()
{

    try {

        $header = "Reviews";
        $id = $_GET["id"];
        $review = getReviewByIdService($id);
        $users = getAllUserService();
        $films = getAllFilmsService();
        ob_start();
        include __DIR__ . "/../../views/pages/admin/reviews/edit.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function updateReviewAdmin()
{
    try {

        $id = $_GET["id"];


        updateReviewService($_POST, $id);
        header("location: admin.php?admin=1&page=reviews");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function deleteReviewAdmin()
{
    try {

        $id = $_GET["id"];
        deleteReviewService($id);
        header("location: admin.php?admin=1&page=reviews");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
