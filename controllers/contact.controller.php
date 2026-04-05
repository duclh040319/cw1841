<?php

require __DIR__."/../services/contact.service.php";

function contactPage() {
    try {
        
        $title = "Contact page";
        ob_start();
        include __DIR__."/../views/pages/contact/contact.html.php";
        $content = ob_get_clean();
    
        include __DIR__."/../views/layouts/main.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function sendEmail() {
    try {
        
        $fromEmail = $_POST["fromEmail"];
        $content = $_POST["content"];
    
        createEmailService($fromEmail,$content);
    } catch (Error $e) {
        echo $e->getMessage();
    }
}