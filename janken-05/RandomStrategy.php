<?php
require_once('StrategyInterface.php');

class RandomStrategy implements StrategyInterface {
  
  public function nextHand() {
    return random_int(0, 2);
  }
}

// 修正時刻: Sat Jan 15 15:26:24 2022
