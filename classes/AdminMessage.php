<?php

class AdminMessage implements Message
{
  private $id;
  private $timestamp;
  private $userName;
  private $message;

  public function __construct(
    string $id,
    int $timestamp,
    string $userName,
    string $message
  ) {
    $this->setId($id);
    $this->setTimestamp($timestamp);
    $this->setUserName($userName);
    $this->setMessage($message);
  }

  public function setId(string $id)
  {
    $this->id = $id;
  }

  public function setTimestamp(int $timestamp)
  {
    $this->timestamp = $timestamp;
  }

  public function setUserName(string $userName)
  {
    $this->userName = $userName;
  }

  public function setMessage(string $message)
  {
    $this->message = $message;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getTimestamp()
  {
    return $this->timestamp;
  }

  public function getUserName()
  {
    return $this->userName;
  }

  public function getMessage()
  {
    return $this->message;
  }

  public function createMessage()
  {
  }

  public function readMessage()
  {
  }

  public function updateMessage()
  {
  }

  public function deleteMessage()
  {
  }
}
