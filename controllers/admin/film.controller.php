<?php
require_once __DIR__."/../../services/film.service.php";

function getAllFilmsAdmin() {
    $films = getAllFilmsService();

    return $films;
}

function getFilmByIdAdmin() {
    $id = $_GET["id"];
    $film = getFilmByIdService($id);
    return $film;
}

function createFilmAdmin() {
    createFilmService($_POST);
}

function updateFilmAdmin() {
    $id = $_GET["id"];
    updateFilmService($id,$_POST);
}

function deleteFilmByIdAdmin() {
    $id = $_GET["id"];
    deleteFilmService($id);
}
