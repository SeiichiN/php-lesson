<?php
class Player {
  private $name;
  private $hand;
  private $result;

  public function __construct (string $name) {
    $this->name = $name;
  }

  public function getName() { return $this->name; }
  public function getHand() { return $this->hand; }
  public function getResult() { return $this->result; }

  public function setName(string $name) {
    $this->name = $name;
  }
  public function setHand(int $hand) {
    $this->hand = $hand;
  }
  public function setResult(string $result) {
    $this->result = $result;
  }
}

// 修正時刻: Sun Dec  5 16:28:17 2021
