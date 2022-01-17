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
$userHand = filter_input(INPUT_POST, 'hand',
                         FILTER_VALIDATE_INT, $options);

$hand = [
  '<img src="img/gu.png" alt="グー">',
  '<img src="img/choki.png" alt="チョキ">',
  '<img src="img/pa.png" alt="パー">',
  '？'
];

$user->setHand($userHand);
$com1->setNextHand();
$com2->setNextHand();

$msg = Judge::execute($user, $com1, $com2);
$_SESSION['user'] = serialize($user);
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>じゃんけんゲーム結果</title>
    <style>
     img { width: 100px; }
    </style>
  </head>
  <body>
    <h1>じゃんけんゲーム結果</h1>

    <span>
      <?php echo h($user->getName()); ?>:
      <?php echo $hand[$user->getHand()]; ?>
    </span>

    <span>
      <span title="<?php echo $com1->getStrategy()->getName(); ?>">
        <?php echo h($com1->getName()); ?>
      </span>:
      <?php echo $hand[$com1->getHand()]; ?>
    </span>

    <span>
      <span title="<?php echo $com2->getStrategy()->getName(); ?>">
        <?php echo h($com2->getName()); ?>
      </span>:
      <?php echo $hand[$com2->getHand()]; ?>
    </span>

    <p><?php echo h($msg); ?></p>

    <p><a href="/">もどる</a></p>
  </body>
</html>
<!-- 修正時刻: Sat Jan 15 17:52:08 2022 -->
