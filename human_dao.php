<?php
    require_once 'human.php';
    
    // データベースを扱う便利屋さん
    class HumanDAO{
        // データベースと接続を行うメソッド
        private static function get_connection(){
            
            // データベース接続情報      
            $dsn = "mysql:host=localhost;dbname=humans_sample";
            $db_username = "root";
            $db_password = "";
        
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // 失敗したら例外を投げる
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,   //デフォルトのフェッチモードはクラス
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   //MySQL サーバーへの接続時に実行するコマンド
            );
        
            // データベースを扱う万能の神様誕生
            $pdo = new PDO($dsn, $db_username, $db_password, $options);
            
            // 神様はいあげる
            return $pdo;
        }
    
        // データベースとの切断を行うメソッド
        private static function close_connection($pdo, $stmp){
            // 神様さようなら
            $pdo = null;
            // 実行結果さようなら
            $stmp = null;
        }
    
        // 全会員情報を取得するメソッド
        public static function get_all_humans(){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する
                $stmt = $pdo->query('SELECT * FROM humans');
                // フェッチの結果を、Humanクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human');
                // 会員全データをHumanクラスのインスタンス配列で取得
                $humans = $stmt->fetchAll();
                
                // Humanクラスのインスタンスの配列を返す
                return $humans;
                
            }catch(PDOException $e){
                // とりあえず空の配列を返す
                return array();
            
            }finally{
                // 神様さようなら
                self::close_connection($pdo, $stmp);
            }
        }
    
        // 会員を1件登録するメソッド
        public static function insert($human){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO humans (name, age) VALUES (:name, :age)");
                
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':name', $human->name, PDO::PARAM_STR);
                $stmt->bindParam(':age', $human->age, PDO::PARAM_INT);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "会員登録が完了しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
    }