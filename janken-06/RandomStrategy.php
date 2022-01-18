<?php 
require_once('Strategy.php');

class RandomStrategy extends Strategy {
  public function nextHand() {
    return random_int(0, 2);
  }
}



// 修正時刻: Wed Jan 19 06:41:37 2022
