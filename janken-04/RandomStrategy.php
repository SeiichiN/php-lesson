<?php
require_once('StrategyInterface.php');


class RandomStrategy implements StrategyInterface {
  private $com;

  public function __construct(Player $com) {
    $this->com = $com;
  }
  
  public function nextHand() {
    // echo 'com:', $com->getResult() , '<br>';
    $nextHand = random_int(0, 2);
    return $nextHand;
  }
}

// 修正時刻: Fri Jan 14 08:04:48 2022
