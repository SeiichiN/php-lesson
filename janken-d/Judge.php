<?php
class Judge {
  public static function exec($user, $com) {
    if (($user->getHand() + 1) % 3 === $com->getHand()) {
      $msg = "あなたの勝ち";
      $user->setResult("win");
      $com->setResult("lose");
    } else if ($user->getHand() === $com->getHand()) {
      $msg = "引分け";
      $user->setResult("draw");
      $com->setResult("draw");
    } else {
      $msg = "わたしの勝ち";
      $user->setResult("lose");
      $com->setResult("win");
    }
    return $msg;
  }
}

// 修正時刻: Sun Dec  5 17:19:14 2021
