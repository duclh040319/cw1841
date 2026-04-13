<?php

require_once __DIR__ . "/../models/Film.php";

function getAllFilmsService()
{
    $films = getAllFilms();

    return $films;
}

function getFilmByIdService($id)
{
    if (empty($id)) throw new Error("ID is required");

    $film = getFilmById($id);
    if (empty($film)) {
        throw new Error("Film not found");
    }

    return $film;
}

function createFilmService($post)
{

    // 
    $title = $post["title"];
    $description = $post["description"];
    $releaseYear = $post["releaseYear"];
    $image = "";
    $createdAt = date('Y-m-d');

    if (empty($title)) throw new Error("Title is required");


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


    return createFilm($title, $description, $releaseYear, $image, $createdAt);
}

function updateFilmService($id, $post)
{
    $title = $post["title"];
    $description = $post["description"];
    $releaseYear = $post["releaseYear"];
    $createdAt = date('Y-m-d');

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

    updateFilm($id, $title, $description, $releaseYear, $image, $createdAt);
}

function deleteFilmService($id)
{
    if (empty($id)) throw new Error("ID is required");

    $film = getFilmById($id);

    if ($film) {
        $imageName = $film['image'];
        $filePath = 'uploads/' . $imageName;


        if (!empty($imageName) && file_exists($filePath)) {
            unlink($filePath);
        }

        deleteFilm($id);
    }
}

function searchFilmService($title)
{
    if (empty($title)) throw new Error("Title is empty");

    return searchFilm($title);
}

function sortFilmASCService()
{
    return sortFimlASC();
}

function sortFilmDESCService()
{
    return sortFilmDESC();
}
