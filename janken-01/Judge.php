<?php
class Judge {
  public function execute($user, $com) {
    $userHand = $user->getHand();
    $comHand = $com->getHand();

    $msg = "";
    if ($userHand === $comHand) {
      $msg = "引き分け";
      $user->setResult("draw");
      $com->setResult("draw");
    } else if (($userHand + 1) % 3 === $comHand) {
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

// 修正時刻: Sat Jan  8 14:24:25 2022
