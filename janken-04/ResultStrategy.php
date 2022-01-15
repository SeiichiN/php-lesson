<?php
require_once('StrategyInterface.php');

class ResultStrategy implements StrategyInterface {
  private $com;

  public function __construct(Player $com) {
    $this->com = $com;
  }
  
  public function nextHand() {
    $result = $this->com->getResult();
    $hand = $this->com->getHand();

    if ($result === "lose") {
      $nextHand = $hand;
    }
    else if ($result === "draw"){
      $nextHand = ($hand + 1) % 3;
    }
    else {
      $nextHand = random_int(0, 2);
    }
    return $nextHand;
  }
}

// 修正時刻: Sat Jan 15 14:25:01 2022
