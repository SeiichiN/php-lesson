<?php
class Judge {
  public static function execute($user, $com1, $com2) {
    $userHand = $user->getHand();
    $com1Hand = $com1->getHand();
    $com2Hand = $com2->getHand();

    $msg = "";
    if ($userHand === 3) {
      $msg = "手を選んでください";
      return $msg;
    }
    if (($userHand + 1) % 3 === $com1Hand && ($userHand + 1) % 3 === $com2Hand) {
      $msg = $user->getName() . "の勝ち";
      $user->setResult("win");
      $com1->setResult("lose");
      $com2->setResult("lose");
    }
    else if (($com1Hand + 1) % 3 === $userHand && ($com1Hand + 1) % 3 === $com2Hand) {
      $msg = $com1->getName() . "の勝ち";
      $user->setResult("lose");
      $com1->setResult("win");
      $com2->setResult("lose");
    }
    else if (($com2Hand + 1) % 3 === $userHand && ($com2Hand + 1) % 3 === $com1Hand) {
      $msg = $com2->getName() . "の勝ち";
      $user->setResult("lose");
      $com1->setResult("lose");
      $com2->setResult("win");
    }
    else {
      $msg = "引き分け";
      $user->setResult("draw");
      $com1->setResult("draw");
      $com2->setResult("draw");
    }
    $_SESSION['com1'] = serialize($com1);
    $_SESSION['com2'] = serialize($com2);
    $_SESSION['user'] = serialize($user);
    return $msg;
  }
}

// 修正時刻: Mon Jan 10 13:21:05 2022
