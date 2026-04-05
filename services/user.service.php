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
    $username = $post["username"];
    $password = $post["password"];
    $createdAt = date("Y/m/d");

    if (empty($username)) throw new Error("User name is required");
    if (empty($password)) throw new Error("Password is required");

    createUser($username, $password, $createdAt);
}

function updateUserService($id, $post)
{
    $username = $post["username"];
    $password = $post["password"];
    $role = $post["role"];

    if (empty($id)) throw new Error("ID is required");
    if (empty($username)) throw new Error("Username is required");
    if (empty($password)) throw new Error("Password is required");
    updateUser($id, $username, $password, $role);
}

function deleteUserService($id)
{

    
    if (empty($id)) throw new Error("ID is required");
    deleteUser($id);
}
