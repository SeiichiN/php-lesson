<?php
class Janken {
  public $user;
  public $com;
  public $result;

  public function __construct (string $user, string $com) {
    $this->user = $user;
    $this->com = $com;
    $this->judge();
  }
  
  public function judge() {
    switch ($this->user) {
      case "gu":
        if ($this->com == "gu")    { $this->result = "引き分けです"; }
        if ($this->com == "choki") { $this->result = "あなたの勝ち"; }
        if ($this->com == "pa")    { $this->result = "わたしの勝ち"; }
        break;
      case "choki":
        if ($this->com == "gu")    { $this->result = "わたしの勝ち"; }
        if ($this->com == "choki") { $this->result = "引き分けです"; }
        if ($this->com == "pa")    { $this->result = "あなたの勝ち"; }
        break;
      case "pa":
        if ($this->com == "gu")    { $this->result = "あなたの勝ち"; }
        if ($this->com == "choki") { $this->result = "わたしの勝ち"; }
        if ($this->com == "pa")    { $this->result = "引き分けです"; }
        break;
      default:
        $this->result = "あめま";
    }
  }
}

// 修正時刻: Sun Jun 27 09:57:46 2021
