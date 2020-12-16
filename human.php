<?php
    // 人間の設計図を作る
    class Human{
        // プロパティ
        public $name; // 名前
        public $age; // 年齢
        
        // メソッド（関数）
        // コンストラクタ
        public function __construct($name="", $age=""){
            $this->name = $name;
            $this->age = $age;
        }
        // 自己紹介をする
        public function speak(){
            print($this->name . "さんの年齢は" . $this->age . "歳です。\n");
        }
        // お酒を飲む
        public function drink(){
            // 20歳以上ならば飲める
            if($this->age >= 20){
                // print("お酒をおいしく飲みましょう。\n");
                $message = "お酒をおいしく飲みましょう。\n";
                // はいあげる
                return $message;
            }else{
                // print("20歳未満なのでまだお酒を飲めません。\n");
                // print("あと" . (20 - $this->age) . "年待ってくださいね！\n");
                $message = "20歳未満なのでまだお酒を飲めません。\n";
                // 文字列の連結
                // $message = $message . "あと" . (20 - $this->age) . "年待ってくださいね！\n";
                $message .= "あと" . (20 - $this->age) . "年待ってくださいね！\n";
                // はいあげる
                return $message;
            }
        }
        
    }
?>