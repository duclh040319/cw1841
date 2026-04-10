<?php

require __DIR__ . "/../services/wishlist.service.php";

function wishlistPage()
{
    try {
        $title = "Wishlist";
        $userId = $_SESSION["user"]["id"];
        $wishlist = getAllWishlistService($userId);
        ob_start();

        include __DIR__ . "/../views/pages/wishlist/wishlist.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function addWishlist1()
{
    try {

        $filmId = $_POST["film_id"];
        $wishlistId = $_POST["wishlistId"];
        $userId = $_SESSION["user"]["id"];

        addWishListService($filmId, $userId, $wishlistId);
        header("location: index.php");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
        header("location: index.php");
        exit();
    }
}

function deleteWishlist1()
{
    try {

        $id = $_POST["wishlistId"];
        deleteWishlistService($id);
        header("location: index.php?page=wishlist");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
