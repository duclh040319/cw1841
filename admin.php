<?php

require __DIR__."/middlewares/auth.middleware.php";
session_start();

if(empty($_SESSION["user"]) || $_SESSION["user"]["role"] !== 1) {
    header("location: index.php");
    exit();
}

$page = $_GET["page"] ?? "dashboard";
$action = $_GET["action"] ?? "list";

switch ($page) {
    case "reviews":
        require_once __DIR__ . "/controllers/admin/review.controller.php";
        require_once __DIR__ . "/controllers/admin/film.controller.php";
        $header = "Reviews";


        if ($action === "create") {
            $films = getAllFilmsAdmin();
            $view = "/views/pages/admin/reviews/create.html.php";
        } elseif ($action === "store") {
            createReviewAdmin();
            header("location: admin.php?admin=1&page=reviews");
            exit();
        } elseif ($action === "edit") {
            $review = getReviewByIdAdmin();
            $view = "/views/pages/admin/reviews/edit.html.php";
        } elseif ($action === "update") {
            updateReviewAdmin();
            header("location: admin.php?admin=1&page=reviews");
            exit();
        } elseif ($action === "delete") {
            deleteReviewAdmin();
            header("location: admin.php?admin=1&page=reviews");
            exit();
        } else {
            $reviews = getAllReviewsAdmin();
            $view = "/views/pages/admin/reviews/list.html.php";
        }

        ob_start();
        include __DIR__ . $view;
        $content = ob_get_clean();

        include __DIR__ . "/views/layouts/admin.php";
        break;
    case "films":
        require_once __DIR__ . "/controllers/admin/film.controller.php";

        $header = "Films";


        if ($action === "create") {
            $view = "/views/pages/admin/films/create.html.php";
        } elseif ($action === "store") {

            createFilmAdmin();
            header("location: admin.php?admin=1&page=films");
            exit();
        } elseif ($action === "edit") {
            $film = getFilmByIdAdmin();
            $view = "/views/pages/admin/films/edit.html.php";
        } elseif ($action === "update") {
            updateFilmAdmin();
            header("location: admin.php?admin=1&page=films");
            exit();
        } elseif ($action === "delete") {
            deleteFilmByIdAdmin();
            header("location: admin.php?admin=1&page=films");
            exit();
        } else {
            $films = getAllFilmsAdmin();

            $view = "/views/pages/admin/films/list.html.php";
        }
        // view
        ob_start();
        include __DIR__ . $view;
        $content = ob_get_clean();
        include __DIR__ . "/views/layouts/admin.php";
        break;
    case "users":
        require_once __DIR__ . "/controllers/admin/user.controller.php";
        $header = "Users";


        if ($action === "create") {
            
            $view = "/views/pages/admin/users/create.html.php";
        } elseif ($action === "store") {
            createUserAdmin();
            header("location: admin.php?admin=1&page=users");
            exit();
        } elseif ($action === "edit") {
            $user = getUserByIdAdmin();
            $view = "/views/pages/admin/users/edit.html.php";
        } elseif ($action === "update") {
            updateUserAdmin();
            header("location: admin.php?admin=1&page=users");
            exit();
        } elseif ($action === "delete") {
            deleteUserAdmin();
            header("location: admin.php?admin=1&page=users");
            exit();
        } else {
            $users = getAllUserAdmin();
            $view = "/views/pages/admin/users/list.html.php";
        }

        ob_start();
        include __DIR__ . $view;

        $content = ob_get_clean();
        include __DIR__ . "/views/layouts/admin.php";
        break;
    case "logout":
        session_unset();

        session_destroy();

        header("location: admin.php");
        exit();
        break;
    default:
        require_once __DIR__ . "/controllers/admin/dashboard.controller.php";
        $numberOfFilm = getCountFilm();
        $numberOfReview = getCountReview();
        $numberOfUser = getCountUser();
        $header = "Dashboard";

        ob_start();
        include __DIR__ . "/views/pages/admin/dashboard.html.php";
        $content = ob_get_clean();

        include __DIR__ . "/views/layouts/admin.php";

        break;
}
