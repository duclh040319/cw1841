<?php

require __DIR__."/../services/user.service.php";

function profilePage() {
    $userId = $_SESSION["user"]["id"];

    $user = getUserByIdService($userId);
    $title = "Profile";
    ob_start();
    include __DIR__."/../views/pages/profiles/profile.html.php";
    $content = ob_get_clean();
    include __DIR__."/../views/layouts/main.php";
}