<?php
require_once __DIR__ . "/../../services/film.service.php";



function listFilmsPageAdmin()
{
    try {

        $header = "Films";
        $films = getAllFilmsService();
        ob_start();
        include __DIR__ . "/../../views/pages/admin/films/list.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function createFilmPageAdmin()
{
    try {

        $header = "Films";

        ob_start();
        include __DIR__ . "/../../views/pages/admin/films/create.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function createFilmAdmin()
{
    try {

        $filmId = createFilmService($_POST);
        header("location: admin.php?admin=1&page=films");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function editFilmPageAdmin()
{
    try {

        $id = $_GET["id"];
        $film = getFilmByIdService($id);
        $header = "Films";
        ob_start();
        include __DIR__ . "/../../views/pages/admin/films/edit.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function updateFilmAdmin()
{
    try {
        $id = $_GET["id"];
        updateFilmService($id, $_POST);
        header("location: admin.php?admin=1&page=films");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function deleteFilmByIdAdmin()
{
    try {
        $id = $_GET["id"];
        deleteFilmService($id);
        header("location: admin.php?admin=1&page=films");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
