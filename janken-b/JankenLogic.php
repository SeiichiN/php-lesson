<?php
class JankenLogic {
  public static function execute(Janken $janken) {
    switch ($janken->user) {
      case "gu":
        if ($janken->com == "gu")    { $janken->result = "引き分けです"; }
        if ($janken->com == "choki") { $janken->result = "あなたの勝ち"; }
        if ($janken->com == "pa")    { $janken->result = "わたしの勝ち"; }
        break;
      case "choki":
        if ($janken->com == "gu")    { $janken->result = "わたしの勝ち"; }
        if ($janken->com == "choki") { $janken->result = "引き分けです"; }
        if ($janken->com == "pa")    { $janken->result = "あなたの勝ち"; }
        break;
      case "pa":
        if ($janken->com == "gu")    { $janken->result = "あなたの勝ち"; }
        if ($janken->com == "choki") { $janken->result = "わたしの勝ち"; }
        if ($janken->com == "pa")    { $janken->result = "引き分けです"; }
        break;
      default:
        $janken->result = "あめま";
    }
  }

}

// 修正時刻: Sun Jun 27 09:32:20 2021
