<?php

require __DIR__ . "/../services/auth.service.php";

function login()
{
    try {
        loginService();
    } catch (Error $e) {
        header("location: index.php?page=login");
        echo $e->getMessage();
        exit();
    }
}

function loginPage()
{
    ob_start();
    include __DIR__ . "/../views/auth/login.html.php";
    $content = ob_get_clean();
    include __DIR__ . "/../views/layouts/main.php";
}
function registerPage()
{
    ob_start();
    include __DIR__ . "/../views/auth/register.html.php";
    $content = ob_get_clean();
    include __DIR__ . "/../views/layouts/main.php";
}

function register()
{
    try {
        registerService();
    } catch (Error $e) {
        header("location: index.php?page=register");
        echo $e->getMessage();
        exit();
    }
}
