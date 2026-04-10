<?php
function requireLogin() {
    if (empty($_SESSION["user"])) {
            header("location: index.php?page=login");
            exit();
        }
}

function requireAdmin() {
    if (empty($_SESSION["user"]) || (int)$_SESSION["user"]["role"] !== 1) {
        header("location: index.php");
        exit();
    }
}