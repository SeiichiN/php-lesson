<?php
class Player {
  private $name;
  private $hand;
  private $result;
  private $strategy;

  public function __construct($name) {
    $this->name = $name;
  }

  public function setNextHand() {
    $nextHand = $this->strategy->nextHand();
    $this->setHand($nextHand);
  }

  public function setStrategy($strategy) {
    $this->strategy = $strategy;
  }

  public function getName() { return $this->name; }
  public function getHand() { return $this->hand; }
  public function getResult() { return $this->result; }

  public function setName($name) { $this->name = $name; }
  public function setHand($hand) { $this->hand = $hand; }
  public function setResult($result) { $this->result = $result; }
}


// 修正時刻: Sat Jan 15 15:14:05 2022
