<?php
require __DIR__ . "/../../services/user.service.php";

function listUserPageAdmin()
{
    try {
        $header = "Users";
        $users = getAllUserService();
        ob_start();
        include __DIR__ . "/../../views/pages/admin/users/list.html.php";

        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function createUserPageAdmin()
{
    try {
        $header = "Create User";
        ob_start();
        include __DIR__ . "/../../views/pages/admin/users/create.html.php";

        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}



function createUserAdmin()
{

    try {

        createUserService($_POST);
        header("location: admin.php?admin=1&page=users");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function editUserPageAdmin()
{
    try {
        $header = "Edit User";
        $id = $_GET["id"];
        $user = getUserByIdService($id);
        ob_start();
        include __DIR__ . "/../../views/pages/admin/users/edit.html.php";

        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function updateUserAdmin()
{
    try {

        $id = $_GET["id"];
        updateUserService($id, $_POST);
        header("location: admin.php?admin=1&page=users");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function deleteUserAdmin()
{
    try {

        $id = $_GET["id"];
        deleteUserService($id);
        header("location: admin.php?admin=1&page=users");
        exit();
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
