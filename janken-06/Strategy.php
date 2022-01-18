<?php
require_once('StrategyInterface.php');

abstract class Strategy implements StrategyInterface {
  private $name;

  public function __construct() {
    $this->name = get_class($this);
  }
  
  public abstract function nextHand();

  public function getName() {
    return $this->name;
  }
}

// 修正時刻: Wed Jan 19 06:44:41 2022
