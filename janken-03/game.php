<?php
session_start();

require_once('Player.php');
require_once('Judge.php');
require_once('util.php');

$user = unserialize($_SESSION['user']);
$com = unserialize($_SESSION['com']);

$options = [
  'options' => [
    'default' => 3,
    'min_range' => 0,
    'max_range' => 2
  ]
];
$userHand = filter_input(INPUT_POST, 'hand', FILTER_VALIDATE_INT, $options);
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
      <?php echo h($user->getName()) ?>:<?php echo h($hand[$user->getHand()]); ?><br/>
      <?php echo h($com->getName()) ?>:<?php echo h($hand[$com->getHand()]); ?>
    </p>
    <p><?php echo h($msg); ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Sat Jan 15 13:54:31 2022 -->
