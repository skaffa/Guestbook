<?php 

require "Message.php";
require "GuestMessage.php";

$guestbook = "guestbook.json";

if (isset($_POST["name"])) {
    $id = sha1(uniqid());
    $timestamp = time();
    $guestMessage = new GuestMessage($id, $timestamp, $_POST["name"], $_POST["message"]);
    $guestMessage->addToGuestbook($guestMessage);
    header('Location: index.php');
}

require "index.view.php";

