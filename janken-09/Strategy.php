<?php
require_once('StrategyInterface.php');

abstract class Strategy implements StrategyInterface {
  private string $name;

  public function __construct(string $name) {
    $this->name = $name;
  }
  
  public abstract function nextHand() : int;

  public function getName() : string{
    return $this->name;
  }
}

// 修正時刻: Mon Jan 17 19:00:50 2022
