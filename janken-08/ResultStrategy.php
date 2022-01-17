<?php
require_once('Strategy.php');

class ResultStrategy extends Strategy {
  private $com;
 
  public function __construct($com) {
    parent::__construct(get_class());
    $this->com = $com;
  }

  /**
   * 次の手を決めるメソッド
   * 戻り値: $nextHand -- 0, 1, 2 
   * 負けたなら、同じ手を出す
   * あいこなら、負ける手を出す
   */
  public function nextHand() {
    // $result => "win", "lose", "draw"
    $result = $this->com->getResult();
    $hand = $this->com->getHand();  // 0, 1, 2

    if ($result === "lose") {
      $nextHand = $hand;
    } else if ($result === "draw") {
      $nextHand = ($hand + 1) % 3;
    } else {
      $nextHand = random_int(0, 2);
    }
    return $nextHand;
  }
}

// 修正時刻: Sat Jan 15 16:41:23 2022
