<?php
session_start();

require_once('Player.php');
require_once('Judge.php');
require_once('util.php');
require_once('ResultStrategy.php');
require_once('StrategyInterface.php');
require_once('RandomStrategy.php');

$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);

// if (isset($_POST['hand'])) {
//   $userHand = (int) $_POST['hand'];
// }
$options = [
  'options' => [
    'default' => 3,
    'min_range' => 0,
    'max_range' => 2
  ]
];
$userHand = filter_input(INPUT_POST, 'hand', FILTER_VALIDATE_INT, $options);

$strategy1 = new ResultStrategy($com1);
$com1Hand = $strategy1->decide($com1);
$strategy2 = new RandomStrategy($com2);
$com2Hand = $strategy2->decide($com2);


$user->setHand($userHand);
$com1->setHand($com1Hand);
$com2->setHand($com2Hand);
$msg = Judge::execute($user, $com1, $com2);
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
      <?php echo h($com1->getName()) ?>:<?php echo h($hand[$com1->getHand()]); ?><br/>
      <?php echo h($com2->getName()) ?>:<?php echo h($hand[$com2->getHand()]); ?>
    </p>
    <p><?php echo h($msg); ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Mon Jan 10 13:24:15 2022 -->
