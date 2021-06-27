<?php
// require_once 'DbManager.php';

/**
 * 使用法
 * $v = new MyValudator();
 * $v->requiredCheck($_POST['id'], 'ID');    // idが入力されているか？(必須検証)
 * $v->regexCheck($_POST['id'], 'ID', '/^[0-9]{4}$/');  // IDが数字4桁か？
 * .....( その他のチェック).....
 * $v();                   // エラーの出力(もしエラーが無ければ何も出力されない)
 *
 * (注) もしデータベースを使う場合は、2行目のコメントを外し、'DbManager.php' を
 *   読み込む必要がある。
 *
 * (出典) 『独習PHP 第3版』山田祥寛・著 翔泳社 2016.04.08 p.532
 */
class MyValidator {
  private $_errors;

  /**
   * コンストラクタで encodingのチェックと nullのチェックを
   * おこなう
   */
  public function __construct(string $encoding = 'UTF-8') {
    $_errors = [];
    mb_internal_encoding($encoding);
    $this->checkEncoding($_GET);
    $this->checkEncoding($_POST);
    $this->checkEncoding($_COOKIE);
    $this->checkNull($_GET);
    $this->checkNull($_POST);
    $this->checkNull($_COOKIE);
  }

  /**
   * 配列の全要素について encodingチェックを行い、
   * もしエラーがあれば、$_errors にエラーメッセージを
   * 格納する
   * @param $data -- $_POST などの配列
   */
  private function checkEncoding(array $data) {
    foreach($data as $key => $value) {
      if (!mb_check_encoding($value)) {
        $this->_errors[] = "{$key}は不正な文字コードです。";
      }
    }
  }

  /**
   * 配列の全要素について ヌルチェックを行う。
   * @param $data -- $_POST などの配列
   */
  private function checkNull(array $data) {
    foreach($data as $key => $value) {
      if (preg_match('/\0/', $value)) {
        $this->_errors[] = "{$key}は不正な文字を含んでいます。";
      }
    }
  }

  /**
   * 項目名 $name の文字列 $value について 必須チェックを行う。
   * もし 空文字なら、$_errors にエラーメッセージを格納する
   * @param $value -- チェック対象の文字列変数
   *        $name -- この項目名
   */
  public function requiredCheck(string $value, string $name) {
    if (trim($value) === '') {
      $this->_errors[] = "{$name}は必須入力です。";
    }
  }

  /**
   * 項目名 $name の文字列 $value の長さをチェックする
   * @param $value -- チェック対象の文字列
   *        $name -- この項目名
   *        $len -- この長さ以内であること
   */
  public function lengthCheck(string $value, string $name, int $len) {
    if (trim($value) !== '') {
      if (mb_strlen($value) > $len) {
        $this->_errors[] = "{$name}は{$len}文字以内で入力してください。";
      }
    }
  }

  /**
   * 項目名 $name の 文字列 $value が整数値であるかをチェック
   * @param $value -- 整数で書かれた文字列
   *        $name -- 項目名
   */
  public function intTypeCheck(string $value, string $name) {
    if (trim($value) !== '') {
      if (!ctype_digit($value)) {
        $this->_errors[] = "{$name}は数値で指定してください。";
      }
    }
  }

  /**
   * $value が 指定範囲内の数値であるかをチェック
   * @param $value -- 数値を表す文字列
   *        $name  -- この項目名
   *        $max -- 最大値(小数点OK)
   *        $min -- 最小値(小数点OK)
   */
  public function rangeCheck(string $value, string $name, float $max, float $min) {
    if (trim($value) !== '') {
      if ($value > $max || $value < $min) {
        $this->_errors[] = "{$name}は{$min}～{$max}で指定してください。";
      }
    }
  }

  /**
   * $value が 日付としての形式を満たしているか
   * @param $value -- 日付の文字列 ex.2019-03-14 あるいは 2019/03/14
   *        $name  -- この項目名
   */
  public function dateTypeCheck(string $value, string $name) {
    if (trim($value) !== '') {
      $res = preg_split('|([/\-])|', $value);
      if (count($res) !== 3 || !@checkdate($res[1], $res[2], $res[0])) {
        $this->_errors[] = "{$name}は日付形式で入力してください。";
      }
    }
  }

  /**
   * $value が 正規表現 $pattern を満たしているか
   * @param $value -- 調べる対象の文字列
   *        $name  -- この項目名
   *        $pattern -- 正規表現文字列
   */
  public function regexCheck(string $value, string $name, string $pattern) {
    if (trim($value) !== '') {
      if (!preg_match($pattern, $value)) {
        $this->_errors[] = "{$name}は正しい形式で入力してください。";
      }
    }
  }

  /**
   * 文字列$value が 配列$opts に含まれているかを判定
   * @param $value -- 調べる対象の文字列
   *        $name  -- この項目名
   *        $opts  -- 配列。この中に $value が含まれていると
   *                  in_array は true となる。
   */
  public function inArrayCheck(string $value, string $name, array $opts) {
    if (trim($value) !== '') {
      // $value が $opts の中に含まれていなければ
      if (!in_array($value, $opts)) {  
        $tmp = implode(',', $opts);
        $this->_errors[] = "{$name}は{$tmp}の中から選択してください。";
      }
    }
  }

  /**
   * 文字列がデータベースに存在しているかをチェック
   * 冒頭の // require_once 'DbManager.php';  のコメントを外し、
   * データベース接続を有効化しなければならない。
   * @param $value -- 調べる対象の文字列
   *        $name  -- この項目名
   *        $sql   -- テーブル<table> の カラム<column> の中に $value があるかを
   *                調べるための SQL文の例。
   *                 "SELECT * FROM <table> WHERE <column> = :value"
   *                プレースホルダーとして :value を使うことが必須。
   */
  public function duplicateCheck(string $value, string $name, string $sql) {
    try {
      $db = getDb();
      $stt = $db->prepare($sql);
      $stt->bindValue(':value', $value);
      $stt->execute();
      if (($row = $stt->fetch()) !== false) {
        $this->_errors[] = "{$name}は重複しています。";
      }
    } catch(PDOException $e) {
      $this->_errors[] = $e->getMessage();
    }
  }

  /**
   * 上記のチェックでエラーがあれば、それを <ul><li> で表示する
   * __invoke() メソッドは マジックメソッド。以下のように使える
   *   $v = new MyValudator()
   *   $v();                  // <-- __invoke が実行される
   */
  public function __invoke() {
    if (count($this->_errors) > 0) {
      print '<ul style="color:Red">';
      foreach ($this->_errors as $err) {
        print "<li>{$err}</li>";
      }
      print '</ul>';
      die();
    }
  }
}

// 修正時刻: Sun Jun 27 08:56:56 2021
