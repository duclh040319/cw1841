<?php

require_once __DIR__ . "/../models/Film.php";

function getAllFilmsService()
{
    $films = getAllFilms();

    return $films;
}

function getFilmByIdService($id)
{
    // handle error


    // 
    $film = getFilmById($id);
    if (empty($film)) {
        return [];
    }

    return $film;
}

function createFilmService($post)
{
    // handle error

    // 
    $title = $post["title"];
    $description = $post["description"];
    $releaseYear = $post["releaseYear"];
    $image = "";;
    $createdAt = date('Y-m-d');

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
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
    }

    createFilm($title, $description, $releaseYear, $image, $createdAt);
}

function updateFilmService($id, $post)
{
    $title = $post["title"];
    $description = $post["description"];
    $releaseYear = $post["releaseYear"];
    $image = $post["image"];
    $createdAt = date('Y-m-d');

    updateFilm($id, $title, $description, $releaseYear, $image, $createdAt);
}

function deleteFilmService($id)
{
    // handle error

    // 

    deleteFilm($id);
}

function countFilmService()
{
    return countFilm();
}
