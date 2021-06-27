<?php
require_once('./MyValidator.php');

$_POST = [
  'isbn' => '978-4-7981-3547-2',
  'title' => '独習PHP 第3版',
  'price' => '3200',
  'publish' => '新潮社',
  'published' => '2016-04-08',
];


$v = new MyValidator();
$v->requiredCheck($_POST['isbn'], 'ISBNコード');    // 必須検証
$v->regexCheck($_POST['isbn'], 'ISBNコード',
               '/^978-4-[0-9]{3,6}-[0-9]{3,6}-[0-9X]{1}$/');  // 正規表現検証
// $v->duplicateCheck($_POST['isbn'], 'ISBNコード',
//                    'SELECT isbn FROM book WHERE isbn = :value');  // 重複検証
$v->requiredCheck($_POST['title'], '書名');    // 必須検証
$v->lengthCheck($_POST['title'], '書名', 100);     // 文字列長検証
$v->intTypeCheck($_POST['price'], '価格', 10000, 1);    // 数値範囲検証
$v->inArrayCheck($_POST['publish'], '出版社',
                 ['翔泳社', '秀和システム', '日経BP社', '技術評論社']);  //配列要素検証
$v->dateTypeCheck($_POST['published'], '刊行日');

?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8"/>
    <title>Validate</title>
  </head>
  <body>
    <?php $v(); ?>
  </body>
</html>


<?php // 修正時刻: Sat Jun 26 18:19:00 2021 ?>
