<?php

require __DIR__ . "/../../services/review.service.php";
require __DIR__ . "/../../services/film.service.php";

function getAllReviewsAdmin()
{
    $reviews = getAllReviewsService();

    return $reviews;
}

function getReviewByIdAdmin()
{
    $id = $_GET["id"];
    $review = getReviewByIdService($id);

    return $review;
}

function createReviewAdmin()
{
    $content = $_POST["content"];
    $rating = $_POST["rating"];
    $filmId = (int) $_POST["filmId"];
    createReviewService($content,$rating,$filmId );
}

function updateReviewAdmin()
{
    $id = $_GET["id"];


    updateReviewService($_POST, $id);
}

function deleteReviewAdmin()
{

    $id = $_GET["id"];
    deleteReviewService($id);
}
