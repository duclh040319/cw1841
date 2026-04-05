<?php
require __DIR__."/../models/User.php";

function loginService() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = getUserByUsername($username);

    if(empty($user)) {
        throw new Error("User not found");
    }

    if($username !== $user["username"] || $password !== $user["password"]) {
        throw new Error("username or password incorrect");
    }

    $_SESSION["user"] = [
        "id"=>$user["id"],
        "username"=>$user["username"],
        "role"=>$user["role"]
    ];

}

function registerService() {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $createdAt = date('Y/m/d');

    $user = getUserByUsername($username);

    if($user) {
        throw new Error("User exist");
    }

    createUser($username,$password,$createdAt);
}