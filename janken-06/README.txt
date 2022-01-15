コム1、コム2、それぞれの文字の上にマウスカーソルをのせると
Strategyの名前が表示されるようにする。

(最初のアイデア)
ResultStrategy、RandomStrategy のそれぞれに $name フィールドを作成し、インスタンスを生成するときに、コンストラクタに「名前」を与えることにより、$name に名前がセットされるようにする。
そして、getName()メソッドにより、名前を表示するようにする。

ただ、それでは同じコードを2つのクラスに書くことになるので、abstractクラス「Strategy.php」を作成し、ResultStrategy、RandomStrategy は、その Strategyクラスを継承すればよい。


(1) Strategy.php を作成する。
    これは、abstractクラスで、StrategyInterface を実装している。
    フィールド -- $name
    コンストラクタ -- $name を引数にとり、$this->name = $name とする。
    抽象メソッド -- nextHand()
    具象メソッド -- getName()

(2) ResultStrategy.php を Strategy抽象クラスを継承するようにする。
    コントラクタにて、親(Strategy抽象クラス)のコンストラクタを呼び、
    引数にて get_class() と名前を指定する。

(3) RandomStrategy.php も Strategy抽象クラスを継承するようにする。
    コンストラクタにて、親のコンストラクタを実行し、引数にて名前
    get_class($this) を指定する。
    
(4) Playerクラスに getStrategy()メソッドを作成する。

(5) game.php にて、コム1 と コム2 の名前の上にマウスカーソルをのせると
    Strategyの名前を表示するようにする。
    <span title="名前">コム1</span>
    
(6) 最後に end.php を作成してセッションを破棄する。



;; 修正時刻: Sat Jan 15 17:03:34 2022
