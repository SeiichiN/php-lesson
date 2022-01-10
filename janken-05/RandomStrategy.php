<?php
require_once('StrategyInterface.php');


class RandomStrategy implements StrategyInterface {
  private $com;

  public function __construct(Player $com) {
    $this->com = $com;
  }
  
  public function decide() {
    // echo 'com:', $com->getResult() , '<br>';
    $newHand = random_int(0, 2);
    return $newHand;
  }
}

// 修正時刻: Mon Jan 10 12:10:39 2022
