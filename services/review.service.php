<?php
require __DIR__ . "/../models/Review.php";

function getAllReviewsService()
{

    return getAllReviews();
}

function getReviewByIdService($id)
{
    if (empty($id)) throw new Error("ID is required");

    return getReviewById($id);
}

function getReviewByFilmIdService($id)
{
    if (empty($id)) throw new Error("ID is required");

    return getReviewByFilmId($id);
}

function createReviewService($content, $rating, $filmId)
{

    $image = "";
    $userId = $_SESSION["user"]["id"];
    $createdAt = date('Y-m-d');

    if (empty($content)) throw new Error("Content is required");
    if (empty($rating)) throw new Error("rating is required");
    if (empty($filmId)) throw new Error("FilmId is required");
    if (empty($userId)) throw new Error("User do  not login yet");

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];

        $newFileName = time() . '_' . $fileName;

        $uploadFileDir = __DIR__ . '/../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $image = $newFileName;
        }
    }

    createReview($content, $image, $rating, $userId, $filmId, $createdAt);
}

function updateReviewService($post, $id)
{

    $content = $post["content"];
    $rating = $post["rating"];
    $createdAt = date('Y-m-d');

    if (empty($id)) throw new Error("ID is required");
    if (empty($content)) throw new Error("Content is required");
    if (empty($rating)) throw new Error("Rating is required");

    $image = $post["old_image"];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];

        $newFileName = time() . '_' . $fileName;

        $uploadFileDir = __DIR__ . '/../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $image = $newFileName;
        }
    }
    updateReview($id, $content, $image, $rating, $createdAt);
}

function deleteReviewService($id)
{
    if (empty($id)) throw new Error("ID is required");

    deleteReview($id);
}
