<?php

require __DIR__ . "/../config/database.php";

function getAllFilms()
{
    global $pdo;

    $sql = "SELECT * FROM films;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getFilmById($id)
{
    global $pdo;

    $sql = "SELECT * FROM films WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function createFilm($title, $description, $releaseYear, $image, $createdAt)
{
    global $pdo;

    $sql = "INSERT INTO films(title,description,releaseYear,image,createdAt) VALUES(?,?,?,?,?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $releaseYear, $image, $createdAt]);

    return $pdo->lastInsertId();
}

function updateFilm($id, $title, $description, $releaseYear, $image, $createdAt)
{
    global $pdo;

    $sql = "UPDATE films SET title=?,description=?,releaseYear=?,image=?,createdAt=? WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $releaseYear, $image, $createdAt, $id]);
}

function deleteFilm($id)
{
    global $pdo;



    $sql = "DELETE FROM films WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

function searchFilm($title)
{
    global $pdo;

    $sql = "SELECT * FROM films WHERE title LIKE ?";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$title . '%']);

    return $stmt->fetchAll();
}

function sortFimlASC()
{
    global $pdo;

    $sql = "SELECT * FROM films ORDER BY title ASC";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll();
}

function sortFilmDESC()
{
    global $pdo;

    $sql = "SELECT * FROM films ORDER BY title DESC";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll();
}
