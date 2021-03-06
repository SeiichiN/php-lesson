<?php
session_start();

require_once('Player.php');
require_once('Judge.php');
require_once('util.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');

$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);

$options = [
  'options' => [
    'default' => 3,
    'min_range' => 0,
    'max_range' => 2
  ]
];
$userHand = filter_input(INPUT_POST, 'hand', FILTER_VALIDATE_INT, $options);

$user->setHand($userHand);
$com1->setNextHand();
$com2->setNextHand();
$msg = Judge::execute($user, $com1, $com2);
$_SESSION['user'] = serialize($user);
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);

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
    <p>
      <?php echo h($user->getName()) ?>:
      <?php echo h($hand[$user->getHand()]); ?>
    </p>
    <p>
      <?php echo h($com1->getName()) ?>:
      <?php echo h($hand[$com1->getHand()]); ?>
    </p>
    <p>
      <?php echo h($com2->getName()) ?>:
      <?php echo h($hand[$com2->getHand()]); ?>
    </p>
    <p><?php echo h($msg); ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Sat Jan 15 15:32:03 2022 -->
