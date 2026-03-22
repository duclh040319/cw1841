<?php
require __DIR__ . "/../../services/user.service.php";

function getAllUserAdmin()
{
    $users = getAllUserService();

    return $users;
}

function getUserByIdAdmin()
{
    $id = $_GET["id"];
    $user = getUserById($id);

    return $user;
}

function createUserAdmin()
{
    createUserService($_POST);
}

function updateUserAdmin()
{

    $id = $_GET["id"];
    updateUserService($id, $_POST);
}

function deleteUserAdmin()
{
    $id = $_GET["id"];
    deleteUserService($id);
}
