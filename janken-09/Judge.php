<?php
class Judge {
  public static function execute(Player $user, Player $com1, Player $com2) : string {
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
    else if (($userHand + 1) % 3 === $com1Hand &&
             ($userHand + 1) % 3 === $com2Hand) {
      $msg = $user->getName() . "と" . $com1->getName() . "の勝ち";
      $user->setResult("win");
      $com1->setResult("win");
      $com2->setResult("lose");
    }
    else if ($userHand === $com1Hand &&
             ($userHand + 1) % 3 === $com2Hand) {
      $msg = $user->getName() . "と" . $com1->getName() . "の勝ち";
      $user->setResult("win");
      $com1->setResult("win");
      $com2->setResult("lose");
    }
    else if ($userHand === $com2Hand &&
             ($userHand + 1) % 3 === $com1Hand) {
      $msg = $user->getName() . "と" . $com2->getName() . "の勝ち";
      $user->setResult("win");
      $com1->setResult("lose");
      $com2->setResult("win");
    }
    else if ($com1Hand === $com2Hand &&
             ($com1Hand + 1) % 3 === $userHand) {
      $msg = $com1->getName() . "と" . $com2->getName() . "の勝ち";
      $user->setResult("lose");
      $com1->setResult("win");
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

// 修正時刻: Mon Jan 17 19:03:32 2022
