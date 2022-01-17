<?php
require_once('StrategyInterface.php');

abstract class Strategy implements StrategyInterface {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }
  
  public abstract function nextHand();

  public function getName() {
    return $this->name;
  }
}

// 修正時刻: Sat Jan 15 06:37:14 2022
