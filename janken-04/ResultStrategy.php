<?php
require_once('StrategyInterface.php');


class ResultStrategy implements StrategyInterface {
  private $com;

  public function __construct(Player $com) {
    $this->com = $com;
  }
  
  public function nextHand() {
    // echo 'com:', $com->getResult() , '<br>';

    if ($this->com->getResult() === "lose") {
      $nextHand = $this->com->getHand();
      // echo 'newHand:' , $newHand, '<br>';
    }
    else if ($this->com->getResult() === "draw"){
      $nextHand = ($this->com->getHand() + 1) % 3;
      // echo 'newHand:' , $newHand, '<br>';
    }
    else {
      $nextHand = random_int(0, 2);
    }
    return $nextHand;
  }
}

// 修正時刻: Fri Jan 14 08:04:19 2022
