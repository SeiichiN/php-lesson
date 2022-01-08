<?php
session_start();

require_once('Player.php');
require_once('Judge.php');

$user = unserialize($_SESSION['user']);
$com = unserialize($_SESSION['com']);

if (isset($_POST['hand'])) {
  $userHand = (int) $_POST['hand'];
}
$comHand = random_int(0, 2);

$user->setHand($userHand);
$com->setHand($comHand);
$msg = Judge::execute($user, $com);
$hand = ['グー', 'チョキ', 'パー'];

?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>janken</title>
  </head>
  <body>
    <h1>janken</h1>
    <?php // echo $userObj->getName(); ?>
    <p>
      <?php echo $user->getName() ?>:<?php echo $hand[$user->getHand()]; ?><br/>
      <?php echo $com->getName() ?>:<?php echo $hand[$com->getHand()]; ?>
    </p>
    <p><?php echo $msg; ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Sat Jan  8 17:43:29 2022 -->
