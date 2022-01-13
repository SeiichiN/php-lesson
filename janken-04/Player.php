<?php
class Player {
  private $name;
  private $hand;
  private $result;
  private $strategy;

  public function __construct($name) {
    $this->name = $name;
  }

  public function setStrategy($strategy) {
    $this->strategy = $strategy;
  }

  public function setNextHand() {
    $nextHand = $this->strategy->nextHand();
    $this->setHand($nextHand);
  }

  public function getName() { return $this->name; }
  public function getHand() { return $this->hand; }
  public function getResult() { return $this->result; }

  public function setName($name) { $this->name = $name; }
  public function setHand($hand) { $this->hand = $hand; }
  public function setResult($result) { $this->result = $result; }
}


// 修正時刻: Fri Jan 14 08:09:11 2022
