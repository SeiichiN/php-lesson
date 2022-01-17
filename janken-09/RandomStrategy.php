<?php 
require_once('Strategy.php');

class RandomStrategy extends Strategy {
  public function __construct() {
    parent::__construct(get_class());
  }
  
  public function nextHand() : int {
    return random_int(0, 2);
  }
}



// 修正時刻: Mon Jan 17 19:01:33 2022
