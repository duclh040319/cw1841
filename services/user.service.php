<?php

require __DIR__ . "/../models/User.php";

function getAllUserService()
{

    return getAllUsers();
}

function getUserByIdService($id)
{
    if (empty($id)) throw new Error("ID is required");
    return getUserById($id);
}

function createUserService($post)
{
    $username = $post["username"] . trim(' ');
    $password = $post["password"] . trim(' ');
    $createdAt = date("Y/m/d");

    if (empty($username)) throw new Error("User name is required");
    if (empty($password)) throw new Error("Password is required");

    $user = getUserByUsername($username);

    if(!empty($user)) throw new Error("User exist");

    createUser($username, $password, $createdAt);
}

function updateUserService($id, $post)
{
    $username = $post["username"] . trim(' ');
    $password = $post["password"] . trim(' ');
    $role = $post["role"];

    if (empty($id)) throw new Error("ID is required");
    if (empty($username)) throw new Error("Username is required");
    if (empty($password)) throw new Error("Password is required");
    updateUser($id, $username, $password, $role);
}

function deleteUserService($id)
{


    if (empty($id)) throw new Error("ID is required");

    $user = getUserById($id);
    if (empty($id)) throw new Error("User not found");

    if ((int)$user["role"] === 1) throw new Error("Account is admin cannot delete");
    deleteUser($id);
}
