<?php
class Judge {
  public static function execute($user, $com1, $com2) {
    $userHand = $user->getHand();  // 0, 1, 2, 3
    $com1Hand = $com1->getHand(); // 0, 1, 2
    $com2Hand = $com2->getHand(); // 0, 1, 2
    $msg = "";

    if ($userHand === 3) {
      $msg = "ちゃんと選択してね";
      return $msg;
    }

    // 判定処理
    if (($userHand + 1) % 3 === $com1Hand &&
        ($userHand + 1) % 3 === $com2Hand) {
      $msg = $user->getName() . "の勝ち";
      $user->setResult("win");
      $com1->setResult("lose");
      $com2->setResult("lose");
    }
    else if (($com1Hand + 1) % 3 === $userHand &&
             ($com1Hand + 1) % 3 === $com2Hand) {
      $msg = $com1->getName() . "の勝ち";
      $user->setResult("lose");
      $com1->setResult("win");
      $com2->setResult("lose");
    }
    else if (($com2Hand + 1) % 3 === $userHand &&
             ($com2Hand + 1) % 3 === $com1Hand) {
      $msg = $com2->getName() . "の勝ち";
      $user->setResult("lose");
      $com1->setResult("lose");
      $com2->setResult("win");
    }
    else {
      $msg = "ひきわけ";
      $user->setResult("draw");
      $com1->setResult("draw");
      $com2->setResult("draw");
    }
    return $msg;
  }
}

// 修正時刻: Fri Jan 14 15:58:05 2022
