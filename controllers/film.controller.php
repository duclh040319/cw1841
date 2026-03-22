<?php
require_once __DIR__ . "/../services/film.service.php";
require_once __DIR__ . "/../services/review.service.php";

function getAll()
{
    $title = "List films page";
    $films = getAllFilmsService();

    ob_start();
    include __DIR__ . "/../views/pages/films/list.html.php";
    $content = ob_get_clean();

    include __DIR__ . "/../views/layouts/main.php";
}

function getById()
{
    
    $id = $_GET["id"] ?? null;
    $film = getFilmByIdService($id);
    $title = $film["title"];
    $reviews = getReviewByFilmIdService($id);

    ob_start();
    include __DIR__."/../views/pages/films/detail.html.php";
    $content = ob_get_clean();
    include __DIR__ . "/../views/layouts/main.php";
}

function create() {
    $id = $_GET["filmId"];
    $content = $_POST["content"];
    $rating = $_POST["rating"];
    createReviewService($content,$rating, $id);
    
}

function updateReview1() {
    $id = $_GET["edit_id"];
    updateReviewService($_POST,$id);
}

function deleteReview1() {
    $id = $_GET["id"];
    deleteReviewService($id);
}
