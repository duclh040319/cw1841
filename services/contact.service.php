<?php

require __DIR__ . "/../models/Email.php";

function createEmailService($fromEmail, $content)
{
    if ($fromEmail === "") throw new Error("Email is required");
    if ($content === "") throw new Error("Content is required");
    $createdAt = date('Y-m-d');
    createEmail($fromEmail, $content, $createdAt);
}

function getAllEmailsService()
{
    return getAllEmails();
}

function getEmailByIdService($id)
{
    if (empty($id)) throw new Error("ID is required");

    $email = getEmailById($id);
    if (empty($email)) throw new Error("Email not exist");

    return $email;
}

function deleteEmailService($id)
{
    if (empty($id)) throw new Error("ID is required");

    $email = getEmailById($id);
    if (empty($email)) throw new Error("Email not exist");

    deleteEmail($id);
}
