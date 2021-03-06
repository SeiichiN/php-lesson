<?php
require_once('Player.php');
require_once('Judge.php');

$userName = filter_input(INPUT_POST, 'userName');
$comName = filter_input(INPUT_POST, 'comName');

$options = ['options' => ['default' => 3, 'min_range' => 0, 'max_range' => 2]];
$userHand = filter_input(INPUT_POST, 'hand', FILTER_VALIDATE_INT, $options);
$comHand = random_int(0, 2);

echo 'userName:' . $userName . "<br>\n";
echo 'comName:' .  $comName . "<br>\n";
echo 'userHand:' . $userHand . "<br>\n";

$user = new Player($userName);
$com = new Player($comName);
$user->setHand($userHand);
$com->setHand($comHand);
$judge = new Judge();
$msg = $judge->execute($user, $com);
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
      <?php echo $user->getName() ?>:<?php echo $user->getHand(); ?><br/>
      <?php echo $com->getName() ?>:<?php echo $com->getHand(); ?>
    </p>
    <p><?php echo $msg; ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Sat Jan 15 13:21:18 2022 -->
