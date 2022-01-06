<?php
require_once("Player.php");
require_once('Judge.php');

// $userHand = intval($_POST['hand']);
$userHand = (int) $_POST['hand'];
$comHand = random_int(0, 2);

$user = new Player('あなた');
$com = new Player('わたし');
$user->setHand($userHand);
$com->setHand($comHand);

// $judge = new Judge();
$result = Judge::execute($user, $com);

echo "game:" . $result . "<br>\n";
echo $user->getName() . ":" . $user->getHand() . ":" . $user->getResult() . "<br>\n";
echo $com->getName() . ":" . $com->getHand() . ":" . $com->getResult() . "<br>\n";



// 修正時刻: Fri Jan  7 07:20:34 2022
