<?php
$filepath = $_SERVER['SCRIPT_NAME'];

if (! preg_match( "/\.html$/", $filepath )) {
  return false;
}

chdir( dirname( substr( $filepath, 1 )));
require_once( $filepath );
return true;

// https://web改善事例.com/php-web-server/
// 修正時刻: Fri Jan  7 08:17:25 2022
