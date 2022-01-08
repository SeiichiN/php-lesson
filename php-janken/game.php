<?php
require_once("Player.php");
require_once('Judge.php');

// $userHand = intval($_POST['hand']);
$userHand = (int) $_POST['hand'];
$comHand = random_int(0, 2);

if (isset($_POST['userName'])) {
  $userName = $_POST['userName'];
} else {
  $userName = 'あなた';
}
if (isset($_POST['comName'])) {
  $comName = $_POST['comName'];
} else {
  $comName = 'わたし';
}

$user = new Player($userName);
$com = new Player($comName);
$user->setHand($userHand);
$com->setHand($comHand);

// $judge = new Judge();
$result = Judge::execute($user, $com);

echo "game:" . $result . "<br>\n";
echo $user->getName() . ":" . $user->getHand() . ":" . $user->getResult() . "<br>\n";
echo $com->getName() . ":" . $com->getHand() . ":" . $com->getResult() . "<br>\n";
?>

<html><body>
<a href="/">もどる</a>
</body></html>

<!-- 修正時刻: Fri Jan  7 09:50:39 2022 -->
