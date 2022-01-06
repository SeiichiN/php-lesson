<?php
class Judge {
  public static function execute($user, $com) {
    $userNum = $user->getHand();
    $comNum = $com->getHand();
    echo "user:" . $userNum . " com:" . $comNum;
    $msg = "";

    if ($userNum === $comNum) {
      $msg = "ひきわけ";
      $user->setResult("draw");
      $com->setResult("draw");
    } else if (($userNum + 1) % 3 === $comNum) {
      $msg = $user->getName() . "の勝ち";
      $user->setResult("win");
      $com->setResult("lose");
    } else {
      $msg = $com->getName() . "の勝ち";
      $user->setResult("lose");
      $com->setResult("win");
    }
    return $msg;
  }
}

// 修正時刻: Fri Jan  7 07:10:21 2022
