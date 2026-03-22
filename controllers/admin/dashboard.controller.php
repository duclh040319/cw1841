<?php

require_once __DIR__."/../../services/film.service.php";
require_once __DIR__."/../../services/review.service.php";
require_once __DIR__."/../../services/user.service.php";

function getCountReview() {
    $count = countReview();
    return $count;
}

function getCountFilm() {
    $count = countFilmService();
    return $count;
}

function getCountUser() {
    $count = countUserService();

    return $count;
}