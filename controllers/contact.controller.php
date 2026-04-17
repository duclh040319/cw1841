<?php

require __DIR__ . "/../services/contact.service.php";

function contactPage()
{
    try {

        $title = "Contact page";
        $err = $_SESSION["email_err"] ?? "";
        unset($_SESSION["email_err"]);

        ob_start();
        include __DIR__ . "/../views/pages/contact/contact.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function sendEmail()
{
    try {

        $fromEmail = $_POST["fromEmail"];
        $content = $_POST["content"];
        createEmailService($fromEmail, $content);
        header("location: index.php");
        exit();
    } catch (Error $e) {
        $_SESSION["email_err"] = $e->getMessage();
        header("location: index.php?page=contact");
        exit();
    }
}
