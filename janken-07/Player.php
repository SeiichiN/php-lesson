<?php

class Player {
  private $name;
  private $hand;
  private $result;
  private $strategy;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getStrategy() {
    return $this->strategy;
  }

  public function setStrategy($strategy) {
    $this->strategy = $strategy;    
  }

  // Strategyが提案した手を、次の手としてセットする
  public function setNextHand() {
    $nextHand = $this->strategy->nextHand();  // 0, 1, 2
    $this->setHand($nextHand);  
  }

  public function getName() { return $this->name; }
  public function getHand() { return $this->hand; }
  public function getResult() { return $this->result; }

  public function setName($name) { $this->name = $name; }
  public function setHand($hand) { $this->hand = $hand; }
  public function setResult($result) {
    $this->result = $result;
  }
}


// 修正時刻: Sat Jan 15 07:50:13 2022
