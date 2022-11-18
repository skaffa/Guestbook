<?php 
session_start();


require "Message.php";
require "GuestMessage.php";

if (isset($_POST["name"])) {
    $id = sha1(uniqid());
    $timestamp = time();
    $_POST["name"] = htmlspecialchars(stripslashes(trim($_POST["name"])));
    $_POST["message"] = htmlspecialchars(stripslashes(trim($_POST["message"])));
    $guestMessage = new GuestMessage($id, $timestamp, $_POST["name"], $_POST["message"]);
    $guestMessage->addToGuestbook($guestMessage);
    $_SESSION['notification']['color'] = '#00a349';
    $_SESSION['notification']['message'] = 'Message successfully added!';
    header('Location: index.php');
}

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $data = (array) json_decode(file_get_contents('guestbook.json'));
    
    $_SESSION['notification']['color'] = '#4e26ff';
    $_SESSION['notification']['message'] = 'Message successfully deleted';
    
    foreach ($data as $key => $item) {
        if ($item->id == $id) {
            unset($data[$key]);
            file_put_contents('guestbook.json', json_encode($data));
        }
        header('Location: index.php');
    }
}

require "index.view.php";

if (isset($_SESSION['notification'])) {
    $color = $_SESSION['notification']['color'];
    $message = $_SESSION['notification']['message'];
    echo("<script>validate('$color', '$message');</script>");
} else {
    echo 'NAAH';
}