<?php
session_start();

date_default_timezone_set('Europe/Amsterdam');

require "Message.php";
require "GuestMessage.php";

function submitMessage()
{
  if (isset($_POST["name"])) {
    $id = sha1(uniqid());
    $timestamp = time();
    $_POST["name"] = htmlspecialchars(stripslashes(trim($_POST["name"])));
    $_POST["message"] = htmlspecialchars(stripslashes(trim($_POST["message"])));
    $guestMessage = new GuestMessage(
      $id,
      $timestamp,
      $_POST["name"],
      $_POST["message"]
    );
    $guestMessage->addToGuestbook($guestMessage);
    $_SESSION["notification"]["color"] = "#00a349";
    $_SESSION["notification"]["message"] = "Message successfully added!";
    header("Location: index.php");
  }
}

function showGuestbook()
{
  $messages = (array) json_decode(file_get_contents("guestbook.json"));
  foreach ($messages as $message) {
    $id = $message->id;
    $name = $message->userName;
    $timestamp = $message->timestamp;
    $time = date("d/M/Y h:i:sa", $timestamp);
    $msg = $message->message;

    echo '
      <article>
          <div class="message-info">
              <div class="name">' .
      $name .
      '</div>
              <div class="time">' .
      $time .
      '</div>
          </div>
          <div class="message">' .
      $msg .
      '</div>
          <button class="delete-button" onclick="deleteMessage(\'' .
      $id .
      '\')"><img src="bin.svg" width="12px" alt="">Delete</button>
      </article>
      ';
  }
}

function removeMessage() {
  if (isset($_GET["delid"])) {
    $id = $_GET["delid"];
    $data = (array) json_decode(file_get_contents("guestbook.json"));

    $_SESSION["notification"]["color"] = "#4e26ff";
    $_SESSION["notification"]["message"] = "Message successfully deleted";

    foreach ($data as $key => $item) {
      if ($item->id == $id) {
        unset($data[$key]);
        file_put_contents("guestbook.json", json_encode($data));
      }
      header("Location: index.php");
    }
  }
}

function notification() {
  if (isset($_SESSION["notification"])) {
    $color = $_SESSION["notification"]["color"];
    $message = $_SESSION["notification"]["message"];
    echo "<script>validate('$color', '$message');</script>";
  }
}

require "index.view.php";
notification();