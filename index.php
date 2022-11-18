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

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $data = (array) json_decode(file_get_contents('guestbook.json'));
    
    foreach ($data as $key => $item) {
        if ($item->id == $id) {
            unset($data[$key]);
            file_put_contents('guestbook.json', json_encode($data));
        }
    }

    header('Location: index.php');
}

require "index.view.php";

