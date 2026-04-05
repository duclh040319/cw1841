<?php

require __DIR__ . "/../contact.controller.php";

function emailPage()
{
    try {

        $emails = getAllEmailsService();
        $header = "Emails";

        ob_start();

        include __DIR__ . "/../../views/pages/admin/emails/list.html.php";
        $content = ob_get_clean();
        include __DIR__ . "/../../views/layouts/admin.php";
    } catch (Error $e) {
        echo $e->getMessage();
    }
}

function deleteEmailAdmin()
{
    try {
        $id = $_GET["id"];
        deleteEmailService($id);
    } catch (Error $e) {
        echo $e->getMessage();
    }
}
