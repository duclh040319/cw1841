<?php
session_start();
require __DIR__ . "/middlewares/auth.middleware.php";


requireAdmin();

$page = $_GET["page"] ?? "dashboard";
$action = $_GET["action"] ?? "list";

switch ($page) {
    case "emails":
        require __DIR__ . "/controllers/admin/email.controller.php";
        $header = "Emails";
        if ($action === "delete") {
            deleteEmailAdmin();
            header("location: admin.php?page=emails");
            exit();
        } else {
            emailPage();
        }
        break;
    case "reviews":
        require_once __DIR__ . "/controllers/admin/review.controller.php";


        if ($action === "create") {
            createReviewPageAdmin();
        } elseif ($action === "store") {
            createReviewAdmin();
        } elseif ($action === "edit") {
            editReviewPage();
        } elseif ($action === "update") {
            updateReviewAdmin();
        } elseif ($action === "delete") {
            deleteReviewAdmin();
        } else {
            listReviewPageAdmin();
        }
        break;

    case "films":
        require_once __DIR__ . "/controllers/admin/film.controller.php";


        if ($action === "create") {
            createFilmPageAdmin();
        } elseif ($action === "store") {

            createFilmAdmin();
        } elseif ($action === "edit") {
            editFilmPageAdmin();
        } elseif ($action === "update") {
            updateFilmAdmin();
        } elseif ($action === "delete") {
            deleteFilmByIdAdmin();
        } else {
            listFilmsPageAdmin();
        }

        break;
    case "users":
        require_once __DIR__ . "/controllers/admin/user.controller.php";
        $header = "Users";


        if ($action === "create") {
            createUserPageAdmin();
        } elseif ($action === "store") {
            createUserAdmin();
        } elseif ($action === "edit") {
            editUserPageAdmin();
        } elseif ($action === "update") {
            updateUserAdmin();
        } elseif ($action === "delete") {
            deleteUserAdmin();
        } else {
            listUserPageAdmin();
        }


        break;


    case "logout":
        session_unset();

        session_destroy();

        header("location: admin.php");
        exit();
        break;
    default:
        require_once __DIR__ . "/controllers/admin/dashboard.controller.php";
        dashboardPageAdmin();

        break;
}
