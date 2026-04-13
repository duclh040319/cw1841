<?php
require __DIR__ . '/../models/Wishlist.php';
function getAllWishlistService($userId)
{
    if (empty($userId)) throw new Error("User not login");
    return getAllWishlist($userId);
}

function addWishListService($filmId, $userId)
{
    if (empty($userId)) throw new Error("User not login");
    if (empty($filmId)) throw new Error("Film ID required");

    $item = getWishlistByFilmId($filmId);
    if(!empty($item)) throw new Error("Item exist");

    addWishList($filmId, $userId);
}

function deleteWishlistService($id)
{
    if (empty($id)) throw new Error("ID is required");

    deleteWishlist($id);
}
