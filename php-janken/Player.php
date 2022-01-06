<?php
class Player {
  private $name;
  private $hand;
  private $result;

  public function __construct (string $name) {
    $this->name = $name;
  }

  public function getName() : string { return $this->name; }
  public function getHand() : int { return $this->hand; }
  public function getResult() : string { return $this->result; }

  public function setName( string $name ) {
    $this->name = $name;
  }
  public function setHand( int $hand ) {
    $this->hand = $hand;
  }
  public function setResult( string $result ) {
    $this->result = $result;
  }
}

// 修正時刻: Fri Jan  7 07:22:58 2022
