<?php
require_once __DIR__ . "/../services/film.service.php";
require_once __DIR__ . "/../services/review.service.php";

function getAll()
{
    try {

        $title = "List films page";
        $films = getAllFilmsService();


        ob_start();
        include __DIR__ . "/../views/pages/films/list.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function getAllSeach()
{
    try {
        $title = "Search Films";
        $filmTitle = $_GET["search"];
        $films = searchFilmService($filmTitle);


        ob_start();
        include __DIR__ . "/../views/pages/films/list.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function getAllASC()
{
    try {
        $title = "Sort Films";
        $films = sortFilmASCService();


        ob_start();
        include __DIR__ . "/../views/pages/films/list.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function getAllDESC()
{
    try {
        $title = "Sort Films";
        $films = sortFilmDESCService();


        ob_start();
        include __DIR__ . "/../views/pages/films/list.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function getById()
{
    try {

        $id = $_GET["id"] ?? null;
        $film = getFilmByIdService($id);
        $title = $film["title"];
        $reviews = getReviewByFilmIdService($id);
        $err = $_SESSION["review_err"] ?? "";
        unset($_SESSION["review_err"]);


        ob_start();
        include __DIR__ . "/../views/pages/films/detail.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function create()
{
    try {

        $id = $_GET["filmId"];
        $content = $_POST["content"];
        $rating = $_POST["rating"];
        createReviewService($content, $rating, $id);
        header("location: index.php?page=films&action=detail&id=" . $id);
        exit();
    } catch (Error $e) {
        $_SESSION["review_err"] =  $e->getMessage();
        $id = $_GET["filmId"];
        header('location: index.php?page=films&action=detail&id=' . $id);
        exit();
    }
}

function updateReview1()
{
    try {

        $id = $_GET["edit_id"];
        updateReviewService($_POST, $id);
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function deleteReview1()
{
    try {

        $id = $_GET["id"];
        deleteReviewService($id);
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
