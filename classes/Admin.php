<?php

class Admin implements User
{
  private $userName;
  private $password;

  public function __construct(string $userName, string $password)
  {
    $this->setName($userName);
    $this->setPassword($password);
  }

  public function setName(string $userName)
  {
    $this->userName = $userName;
  }
  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  public function getName()
  {
    return $this->userName;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function createUser()
  {
  }

  public function readUser()
  {
  }

  public function updateUser()
  {
  }

  public function deleteUser()
  {
  }
}
