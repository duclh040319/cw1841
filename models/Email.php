<?php

require __DIR__."/../config/database.php";

function createEmail($fromEmail,$content, $createdAt) {
    global $pdo;

    $sql = "INSERT INTO emails(fromEmail,content,createdAt) VALUES(?,?,?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fromEmail,$content,$createdAt]);
}

function getAllEmails() {
    global $pdo;

    $sql = "SELECT * FROM emails;";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getEmailById($id) {
    global $pdo;

    $sql = "SELECT * FROM emails WHERE id=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}


function deleteEmail($id) {
    global $pdo;

    $sql = "DELETE FROM emails WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}