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
      $newHand = $hand;
    }
    else if ($result === "draw"){
      $newHand = ($hand + 1) % 3;
    }
    else {
      $newHand = random_int(0, 2);
    }
    return $newHand;
  }
}

// 修正時刻: Sat Jan 15 15:25:52 2022
