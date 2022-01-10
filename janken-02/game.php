<?php
require_once('Player.php');
require_once('Judge.php');
require_once('util.php');

// if (isset($_POST['userName'])) {
//   $userName = $_POST['userName'];
// }
// if (isset($_POST['comName'])) {
//   $comName = $_POST['comName'];
// }
$userName = filter_input(INPUT_POST, 'userName');
$comName = filter_input(INPUT_POST, 'comName');
if (empty($userName)) { $userName = "あなた"; }
if (empty($comName)) { $comName = "わたし"; }

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
$comHand = random_int(0, 2);

/* echo 'userName:' . $userName . "<br>\n";
 * echo 'comName:' .  $comName . "<br>\n";
 * echo 'userHand:' . $userHand . "<br>\n";*/

$user = new Player($userName);
$com = new Player($comName);
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
    <p>
      <?php echo h($user->getName()) ?>:<?php echo h($hand[$user->getHand()]); ?><br/>
      <?php echo h($com->getName()) ?>:<?php echo h($hand[$com->getHand()]); ?>
    </p>
    <p><?php echo h($msg); ?></p>
    <form action="/" method="post">
      <input type="hidden" name="userName" value="<?php echo $user->getName(); ?>"/>
      <input type="hidden" name="comName" value="<?php echo $com->getName(); ?>"/>
      <input type="submit" value="もどる"/>
    </form>
  </body>
</html>
<!-- 修正時刻: Mon Jan 10 07:26:27 2022 -->
