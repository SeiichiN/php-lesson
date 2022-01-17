<?php
session_start();

$_SESSION = [];
if (isset($_COOKIE[session_name()])) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 36000, $params['path']);
}
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>end</title>
</head>
<body>
  <h1>end</h1>
  <p>乙でした</p>
  <p><a href="/">もう一度</a></p>
</body>
</html>

<?php
// 修正時刻: Thu Jan 13 15:11:55 2022
