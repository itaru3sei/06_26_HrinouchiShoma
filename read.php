<?php
// csvの中身を読み込み、配列に格納
$file = new SplFileObject("data/data.csv"); 
$file->setFlags(SplFileObject::READ_CSV); 
foreach ($file as $line) {
    $records[] = $line;
} 

// 最新を上から表示するため、配列をリバース
$records = array_reverse($records);

// HTML文字列を作成
$list_html = "";
foreach ($records as $arr){
    foreach ($arr as $value) {
        $list_html .= $value." ";
    }
    $list_html .= "<br>";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユングの『8つの性格診断タイプ分け』判定テスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>

    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">性格診断</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">登録ページ</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">一覧ページ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div>

    <main class="container">
        <h1>履歴一覧</h1>
        <p><?=$list_html?></p>
    </main>

        
    </div>
</body>

</html>