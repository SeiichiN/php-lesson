<?php
abstract class Bar {
  public function __construct() {
    var_dump(get_class($this));
    var_dump(get_class());
  }
}

// 修正時刻: Wed Jan 19 08:09:35 2022
