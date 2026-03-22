<?php
require __DIR__ . "/../config/database.php";

function getAllUsers()
{
    global $pdo;

    $sql = "SELECT * FROM users;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getUserById($id)
{
    global $pdo;

    $sql = "SELECT * FROM users WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch();
}

function getUserByUsername($username) {
    global $pdo;

    $sql = "SELECT * FROM users WHERE username=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    return $stmt->fetch();
}

function createUser($username, $password)
{
    global $pdo;

    $sql = "INSERT INTO users(username,password) VALUES(?,?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
}

function updateUser($id, $username, $password, $role)
{
    global $pdo;

    $sql = "UPDATE users SET username=?,password=?,role=? WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $role, $id]);
}

function deleteUser($id)
{
    global $pdo;

    $sql = "DELETE FROM users WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

function countUser() {
    global $pdo;

    $sql = "SELECT COUNT(*) FROM users;";
    $stmt = $pdo->query($sql);
    
    return $stmt->fetchColumn();
}
