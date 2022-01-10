<?php
require_once('StrategyInterface.php');


class ResultStrategy implements StrategyInterface {
  private $com;

  public function __construct(Player $com) {
    $this->com = $com;
  }
  
  public function decide() {
    // echo 'com:', $com->getResult() , '<br>';

    if ($this->com->getResult() === "lose") {
      $newHand = $this->com->getHand();
      // echo 'newHand:' , $newHand, '<br>';
    }
    else if ($this->com->getResult() === "draw"){
      $newHand = ($this->com->getHand() + 1) % 3;
      // echo 'newHand:' , $newHand, '<br>';
    }
    else {
      $newHand = random_int(0, 2);
    }
    return $newHand;
  }
}

// 修正時刻: Mon Jan 10 11:56:58 2022
