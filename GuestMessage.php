<?php 

class GuestMessage implements JsonSerializable, Message {

    private $id;
    private $timestamp;
    private $userName;
    private $message;

    public function __construct($id, $timestamp, $userName, $message)  {
        $this->setId($id);
        $this->setTimestamp($timestamp);
        $this->setUserName($userName);
        $this->setMessage($message);

    }    

    public function setId(string $id) {
        $this->id = $id;
    }

    public function setTimestamp(int $timestamp) {
        $this->timestamp = $timestamp;
    }

    public function setUserName(string $userName) {
        $this->userName = $userName;
    }

    public function setMessage(string $message) {
        $this->message = $message;
    }

    public function getId() {
        return $this->id;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getMessage() {
        return $this->message;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public function addToGuestbook($guestMessage) {
        $data = (array)json_decode(file_get_contents("guestbook.json"));
        array_unshift($data, $guestMessage);       
        $convertedData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("guestbook.json", $convertedData);
    }
}