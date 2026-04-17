<?php

require __DIR__ . "/../services/auth.service.php";

function login()
{

    try {
        loginService();

        unset($_SESSION['error']); // clear lỗi cũ nếu có

        header("location: index.php");
        exit();
    } catch (Error $e) {
        $_SESSION['error'] = $e->getMessage();

        header("location: index.php?page=login");
        exit();
    }
}

function loginPage()
{

    try {
        $title = "Login";

        $err = $_SESSION['error'] ?? '';
        unset($_SESSION['error']); // flash message

        ob_start();
        include __DIR__ . "/../views/auth/login.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function registerPage()
{

    try {
        $title = "Register";

        $err = $_SESSION["user_exist"] ?? '';
        unset($_SESSION["user_exist"]); // flash message đúng chỗ

        ob_start();
        include __DIR__ . "/../views/auth/register.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function register()
{

    try {
        registerService();

        unset($_SESSION["user_exist"]); // clear lỗi cũ

        header("location: index.php?page=login");
        exit();
    } catch (Error $e) {
        $_SESSION["user_exist"] = $e->getMessage();

        header('location: index.php?page=register');
        exit();
    }
}