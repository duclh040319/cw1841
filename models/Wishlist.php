<?php
require __DIR__ . "/../config/database.php";

function getAllWishlist($userId)
{
    global $pdo;

    $sql = "
SELECT 
    wishlist.id AS wishlist_id,
    wishlist.filmId,
    films.id AS film_id,
    films.title,
    films.image
FROM wishlist
JOIN films ON wishlist.filmId = films.id
WHERE wishlist.userId = ?
";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    return $stmt->fetchAll();
}

function addWishlist($filmId, $userId)
{
    global $pdo;

    $sql = "INSERT INTO wishlist(filmId,userId) VALUES(?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$filmId, $userId]);
}


function getWishlistByFilmId($filmId)
{
    global $pdo;

    $sql = "SELECT wishlist.* FROM wishlist WHERE wishlist.filmId=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$filmId]);

    return $stmt->fetch();
}

function getWishlistById($id)
{
    global $pdo;

    $sql = "SELECT * FROM wishlist WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch();
}

function deleteWishlist($id)
{
    global $pdo;

    $sql = "DELETE FROM wishlist WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
