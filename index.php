<?php 

require "Message.php";
require "GuestMessage.php";

if (isset($_POST["name"])) {
    $id = sha1(uniqid());
    $timestamp = time();
    $guestMessage = new GuestMessage($id, $timestamp, $_POST["name"], $_POST["message"]);

   var_dump($guestMessage);
}

require "index.view.php";

