<?php 
require_once('Strategy.php');

class RandomStrategy extends Strategy {
  public function __construct() {
    parent::__construct(get_class());
  }
  
  public function nextHand() {
    return random_int(0, 2);
  }
}



// 修正時刻: Sat Jan 15 16:41:38 2022
