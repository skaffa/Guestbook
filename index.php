<?php 
require "Message.php";
require "GuestMessage.php";

$name = $_POST["name"];
$message = $_POST["message"];

function validateInputName($name) {

    $name = trim($name);
    $name = htmlspecialchars($name);

    return $name;
}

function validateInputMessage($message) {
    $message = trim($message);
    $message = htmlspecialchars($message);

    return $message;
}

if (isset($_POST["name"]) && isset($_POST["message"])){
    validateInputName($name);
    validateInputMessage($message);
}

// nog aanpassen
$guestMessage = new GuestMessage(sha1(uniqid()), time(), $name, $message);

// var_dump($guestMessage);

$guestMessage->jsonSerialize();

var_dump($guestMessage);
//

require "index.view.php";

