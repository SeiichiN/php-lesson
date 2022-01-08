<?php
class Player {
  private $name;
  private $hand;
  private $result;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() { return $this->name; }
  public function getHand() { return $this->hand; }
  public function getResult() { return $this->result; }

  public function setName($name) { $this->name = $name; }
  public function setHand($hand) { $this->hand = $hand; }
  public function setResult($result) { $this->result = $result; }
}


// 修正時刻: Sat Jan  8 14:28:57 2022
