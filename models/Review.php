<?php

require __DIR__ . "/../config/database.php";

function getAllReviews()
{
    global $pdo;

    $sql = "SELECT * FROM reviews";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getReviewById($id)
{
    global $pdo;

    $sql = "SELECT * FROM reviews WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function getReviewByFilmId($id)
{
    global $pdo;

    $sql = "SELECT reviews.*, users.username 
            FROM reviews 
            JOIN users ON reviews.userId = users.id 
            WHERE reviews.filmId = ? ORDER BY id DESC;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetchAll();
}





function createReview($content,$image, $rating, $userId, $filmId, $createdAt)
{
    global $pdo;

    $sql = "INSERT INTO reviews(content,image,rating,userId,filmId,createdAt) VALUES(?,?,?,?,?,?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content,$image, $rating, $userId, $filmId, $createdAt]);
}

function updateReview($id, $content, $image, $rating, $createdAt)
{
    global $pdo;

    $sql = "UPDATE reviews SET content=?,image=?,rating=?,createdAt=? WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content,$image, $rating, $createdAt, $id]);
}

function deleteReview($id)
{
    global $pdo;

    $sql = "DELETE FROM reviews WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

function countReview()
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM reviews;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchColumn();
}
