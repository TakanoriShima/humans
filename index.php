<?php
    
    // 外部ファイルの読み込み
    require_once 'human_dao.php';

    // POST通信ならば
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // print("POST通信です");
        // 入力された名前を取得
        $name = $_POST['name'];
        // 入力された年齢を取得
        $age = $_POST['age'];
        print("入力された名前：" . $name);
        print("入力された年齢：" . $age);
        
        // 新しい命を生み出す
        $human = new Human($name, $age);
        
        // テーブルに命を保存
        HumanDAO::insert($human);
    }
    
    // テーブルから全データを取得
    $human_array = HumanDAO::get_all_humans();
    
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>人物一覧</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>人物一覧</h1>
        <!--人物登録フォーム-->
        <form action="index.php" method="POST">
            <label>名前　<input type="text" name="name" placeholder="お名前を入力してください"></label><br>
            <label>年齢　<input type="text" name="age" placeholder="年齢を入力してください"></label><br>
            <input type="submit" value="登録">
        </form>
        <!--テーブル表示-->
        <table>
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>お酒</th>
            </tr>
            <?php foreach($human_array as $human){ ?>
            <tr>
                <td><?= $human->name ?></td>
                <td><?= $human->age ?></td>
                <td><?= $human->drink() ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>