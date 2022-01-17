<?php

class Player {
  private string $name;
  private int $hand;
  private string $result = "";
  private Strategy $strategy;

  public function __construct(string $name) {
    $this->name = $name;
    $this->hand = 3;
  }

  public function getStrategy() : Strategy {
    return $this->strategy;
  }

  public function setStrategy(Strategy $strategy) {
    $this->strategy = $strategy;    
  }

  // Strategyが提案した手を、次の手としてセットする
  public function setNextHand() : void {
    $nextHand = $this->strategy->nextHand();  // 0, 1, 2
    $this->setHand($nextHand);  
  }

  public function getName() : string { return $this->name; }
  public function getHand() : int { return $this->hand; }
  public function getResult() : string { return $this->result; }

  public function setName(string $name) : void { $this->name = $name; }
  public function setHand(int $hand) : void { $this->hand = $hand; }
  public function setResult(string $result) : void {
    $this->result = $result;
  }
}


// 修正時刻: Mon Jan 17 19:06:53 2022
