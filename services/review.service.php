<?php
require __DIR__ . "/../models/Review.php";

function getAllReviewsService()
{
    // handle error

    //
    $reviews = getAllReviews();
    return $reviews;
}

function getReviewByIdService($id)
{
    //handle error


    $review = getReviewById($id);
    return $review;
}

function getReviewByFilmIdService($id) {
    
    return getReviewByFilmId($id);
}

function createReviewService($content,$rating,$filmId)
{
    // handle error


    //
    
    $userId = $_SESSION["user"]["id"];
    $createdAt = date('Y-m-d');

    createReview($content, $rating, $userId, $filmId, $createdAt);
}

function updateReviewService($post, $id)
{
    //handle error


    //
    $content = $post["content"];
    $rating = $post["rating"];
    $createdAt = date('Y-m-d');

    updateReview($id, $content, $rating, $createdAt);
}

function deleteReviewService($id)
{
    // handle error

    // 
    deleteReview($id);
}

function countReviewService() {
    return countReview();
}
