<?php

require __DIR__."/../models/User.php";

function getAllUserService() {
    $users = getAllUsers();

    return $users;
}

function getUserByIdService($id) {
    $user = getUserById($id);

    return $user;
}

function createUserService($post) {
    $username = $post["username"];
    $password = $post["password"];

    createUser($username,$password);
}

function updateUserService($id, $post) {
    $username = $post["username"];
    $password = $post["password"];
    $role = $post["role"];
    updateUser($id,$username,$password,$role);
}

function deleteUserService($id) {
    deleteUser($id);
}

function countUserService() {
    return countUser();
}