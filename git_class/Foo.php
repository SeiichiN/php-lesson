<?php
require_once('Bar.php');

class Foo extends Bar {
  private $name;
  
  public function __construct($name) {
    $this->name = $name;
  }
}

// 修正時刻: Wed Jan 19 08:13:26 2022
