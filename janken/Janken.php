class Janken {
    public $user;
    public $com;
    public $result;

    public function judge() {
        switch ($user) {
        case "gu":
            if ($com == "gu")    { $result = "引き分けです"}
            if ($com == "choki") { $result = "あなたの勝ち"}
            if ($com == "pa")    { $result = "わたしの勝ち"}
            break;
        case "choki":
            if ($com == "gu")    { $result = "わたしの勝ち"}
            if ($com == "choki") { $result = "引き分けです"}
            if ($com == "pa")    { $result = "あなたの勝ち"}
            break;
        case "pa":
            if ($com == "gu")    { $result = "あなたの勝ち"}
            if ($com == "choki") { $result = "わたしの勝ち"}
            if ($com == "pa")    { $result = "引き分けです"}
            break;
        default:
            $result = "あめま";
        }
    }
}

// 修正時刻: Fri Jun 25 07:58:06 2021
