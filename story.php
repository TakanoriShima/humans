<?php
    // 設計図の読み込み
    require_once "human.php";
    
    // 馬場さん登場
    $baba = new Human("馬場", 20);
    // 馬場さんが自己紹介をする
    $baba->speak();
    // 馬場さんがお酒を飲む
    $comment = $baba->drink();
    print($comment);
    
    // 山田さん登場
    $yamada = new Human("山田", 15);
    // 山田さんが自己紹介をする
    $yamada->speak();
    // 山田さんがお酒を飲む
    $comment = $yamada->drink();
    print($comment);
    
?>