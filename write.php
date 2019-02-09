<?php
// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// 診断タイプの定義
$result = [
    "外向思考タイプ" => "<心よりモノ重視型>物事を冷徹に分析する<br>keyword: 合理性、分析、公平さ、リーダー力、客観的、冷静、計算高い出世、権力志向、損得勘定、ドライな関係、相手をコントロールする",
    "内向思考タイプ" => "<理屈先行型>物事につねに論理と意味を求める<br>keyword: 哲学、探究心、観念的、主観的、学究、原理と理論、深い思索、粘り強さ、不変、世間に疎い、マイペース、無表情",
    "外向感情タイプ" => "<ストレート反応型>好き嫌い、快不快の判断が速い<br>keyword: 他人への共感、喜怒哀楽の共有、コミュニケーション、会話、思いやり、気配り、無理が通れば道理が引っ込む、気分屋",
    "内向感情タイプ" => "<喜怒哀楽内包型>おとなしいけれど実は豊かな感情を秘める<br>keyword: 温厚、従順、おとなしい、無口、繊細、心を隠す、ノーリアクション、他者を拒絶、不機嫌、自分のスタイルを変えない",
    "外向感覚タイプ" => "<自己プロデュース型>自分の感覚を羅針盤にする<br>keyword: 流行、ファッション、グルメ、芸術性、時間管理、実務派、ルックス重視、こだわり、頑固、自分のルールを通す",
    "内向感覚タイプ" => "<マイワールドオタク型>自分の世界で完結する<br>keyword: 趣味の世界、繊細さ、独自の感性、モノへの愛情、孤独、オタク、サブカルチャー、引きこもる、社会性の欠如",
    "外向直感タイプ" => "<アイデア瞬発型>本質を見抜いてひらめきを発揮する<br>keyword: インスピレーション、洞察力、発想力、イメージ、行動力、自由、斬新なアイデア、自己中心的、一ヶ所にとどまらない、転職",
    "内向直感タイプ" => "<不思議ちゃん型>見えないものを見通す目を持つ<br>keyword: ひらめき、本質的なものの把握、神秘体験、スピリチュアル、独創的な発想、精神世界への関心、カンが鋭い、マイペース"
];

// CSV書き込み用に変数を定義
$name = $_POST["name"];
$contact = $_POST["contact"];
$score = [0, 0, 0, 0, 0, 0, 0, 0];
$personality = "";
$now = date("Y/m/d H:i:s");

// カテゴリを判別しscoreを加算
for ($i=0; $i<40; $i++) {
    if (isset($_POST["categoryA".$i])) {
        $score[0] += $_POST["categoryA".$i];
    } 
    if (isset($_POST["categoryB".$i])) {
        $score[1] += $_POST["categoryB".$i];
    } 
    if (isset($_POST["categoryC".$i])) {
        $score[2] += $_POST["categoryC".$i];
    } 
    if (isset($_POST["categoryD".$i])) {
        $score[3] += $_POST["categoryD".$i];
    } 
    if (isset($_POST["categoryE".$i])) {
        $score[4] += $_POST["categoryE".$i];
    } 
    if (isset($_POST["categoryF".$i])) {
        $score[5] += $_POST["categoryF".$i];
    } 
    if (isset($_POST["categoryG".$i])) {
        $score[6] += $_POST["categoryG".$i];
    } 
    if (isset($_POST["categoryH".$i])) {
        $score[7] += $_POST["categoryH".$i];
    } 
}

// scoreからpersonalityを判別
$max = 0;
for ($i=0; $i<8; $i++) {
    // psersonality名を定義
    if ($i == 0) {
        $tmp_personality = "外向思考タイプ";
    } elseif ($i == 1) {
        $tmp_personality = "内向思考タイプ";
    } elseif ($i == 2) {
        $tmp_personality = "外向感情タイプ";
    } elseif ($i == 3) {
        $tmp_personality = "内向感情タイプ";
    } elseif ($i == 4) {
        $tmp_personality = "外向感覚タイプ";
    } elseif ($i == 5) {
        $tmp_personality = "内向感覚タイプ";
    } elseif ($i == 6) {
        $tmp_personality = "外向直感タイプ";
    } elseif ($i == 7) {
        $tmp_personality = "内向直感タイプ";
    } 
    $tmp_score = $score[$i];
    // 仮の値と比較しpresonalityを更新
    if ($tmp_score > $max) {
        $max = $tmp_score;
        $personality = $tmp_personality;
    }
}



// csv配列を作成
$csv = [$name, $contact, json_encode($score), $personality, $now];

// csvファイルへ書き込み
$file = fopen("data/data.csv", "a");
flock($file, LOCK_EX);
fputcsv($file, $csv);
flock($file, LOCK_UN);
fclose($file);


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

    <main class="container">
        <h1>診断結果</h1>
        <p>あなたは<strong><?=$personality?></strong>です。</p>
        <p><?=$result[$personality]?></p>
        <small>アンケート内容と分類アルゴリズムは、福島哲夫著『ユング心理学でわかる「8つの性格」』の内容を元に作成しています。</small>
    </main>
</body>

</html>