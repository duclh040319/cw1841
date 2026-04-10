<?php
session_start();

require __DIR__ . "/middlewares/auth.middleware.php";



if (!empty($_SESSION["user"]) && (int)$_SESSION["user"]["role"] === 1) {
    header("location: admin.php");
    exit();
}




$page = $_GET["page"] ?? "films";
$action = $_GET["action"] ?? "list";

switch ($page) {
    case "wishlist":
        require __DIR__ . "/controllers/wishlist.controller.php";
        requireLogin();

        if($action === "delete") {
            deleteWishlist1();

        }elseif($action === "add") {
            addWishlist1();
        }
        else {
            wishlistPage();

        }
        break;
    case "contact":
        require __DIR__ . "/controllers/contact.controller.php";
        if ($action === "send") {
            sendEmail();
            header("location: index.php");
            exit();
        } else {
            contactPage();
        }
        break;

    case "films":
        require_once __DIR__ . "/controllers/film.controller.php";
        if ($action === "detail") {
            requireLogin();
            getById();
        } elseif ($action === "review") {
            requireLogin();
            create();
            $id = $_GET["filmId"];
            header("location: index.php?page=films&action=detail&id=" . $id);
            exit();
        } elseif ($action === "updateReview") {

            updateReview1();
            $id = $_GET["filmId"];
            header("location: index.php?page=films&action=detail&id=" . $id);
            exit();
        } elseif ($action === "deleteReview") {
            deleteReview1();
            $id = $_GET["filmId"];
            header("location: index.php?page=films&action=detail&id=" . $id);
            exit();
        } elseif ($action === "search") {
            getAllSeach();
        } elseif ($action === "sortASC") {
            getAllASC();
        } elseif ($action === "sortDESC") {
            getAllDESC();
        } else {

            getAll();
        }

        break;
    case "profile":
        require __DIR__ . "/controllers/profile.controller.php";
        profilePage();
        break;

    case "login":
        require_once __DIR__ . "/controllers/auth.controller.php";
        $title = "Login";

        if (!empty($_SESSION["user"])) {
            header("location: index.php");
            exit();
        }

        if ($action === "me") {
            login();

            header("location: index.php");
            exit();
        } else {
            loginPage();
        }
        break;

    case "register":
        require_once __DIR__ . "/controllers/auth.controller.php";
        $title = "Register";
        if (!empty($_SESSION["user"])) {
            header("location: index.php");
            exit();
        }

        if ($action === "registered") {
            register();
            header("location: index.php?page=login");
            exit();
        } else {
            registerPage();
        }
        break;

    case "logout":

        session_unset();

        session_destroy();

        header("location: index.php");
        exit();
        break;
    default:
        header("location: index.php");
        break;
}
