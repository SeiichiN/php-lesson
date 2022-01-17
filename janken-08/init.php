<?php

function init() {
  $user = new Player("あなた");
  $_SESSION['user'] = serialize($user);

  $com1 = new Player("コム1");
  $com1->setStrategy(new ResultStrategy($com1));
  $_SESSION['com1'] = serialize($com1);

  $com2 = new Player("コム2");
  $com2->setStrategy(new RandomStrategy());
  $_SESSION['com2'] = serialize($com2);
}


// 修正時刻: Mon Jan 17 12:28:34 2022
