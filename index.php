<?php
// 質問と分類タイプを定義
$data = [
    "自分は理屈っぽいほうだと思う" => "A", 
    "一人でじっくり考えるのが好き" => "B", 
    "気分が変わりやすいと人から言われる" => "C", 
    "心からリラックスして会話できる相手は限られている" => "D", 
    "新しいことを体験するのが好き" => "G", 
    "心霊現象や超常現象が好き" => "H", 
    "恋愛をするより恋愛小説やドラマを楽しむのが好き" => "D", 
    "本当は喜怒哀楽を感じているのにそれを人に伝えるのが苦手" => "D", 
    "人の服装や化粧の変化によく気がつく" => "E", 
    "自慢できるコレクションがある" => "F", 
    "思いつきで行動することが多い" => "G", 
    "アイデアが豊富だと言われる" => "G", 
    "事務作業が得意" => "E", 
    "つまらないことでも一度怒ったら根に持つ" => "B", 
    "学校や職場の女性同士の会話はくだらないと思う" => "A", 
    "一人で空想にふけることがよくある" => "F", 
    "宇宙や社会の成り立ちについてよく考えることがある" => "B", 
    "人の気持ちを気遣うのがうまいほうだ" => "C", 
    "空気が読めないとよく言われる" => "G", 
    "実は人の話を聞いていないことが多い" => "H", 
    "物事を論理立てて根拠をともなって説明するのが得意" => "A", 
    "考えが飛んでいると人によく言われる" => "G", 
    "ドラマより実話のほうが好き" => "A", 
    "誰とでもとりあえず仲良くできる" => "C", 
    "パーティなどで初対面の人と話すのは楽しい" => "C", 
    "買い物をする時には必ず他の店の商品と質や値段について比較する" => "E", 
    "オシャレな店をいくつか知っている" => "E", 
    "自分の気持ちをうまく言葉にできないことが多い" => "D", 
    "友達同士の何気ない会話に軽くのっていくのが得意" => "C", 
    "人の外見にとらわれず、その人の本質をとらえるのが得意" => "H", 
    "誰かがミスや失敗した時に、その人の気持ちより原因を考えるのが好き" => "A",  
    "自分が物を考えている時、その思考がいったい何に規定されているのかを考える" => "B", 
    "今自分が見ている世界が実在するかどうかは証明できないと思う" => "B", 
    "自分はオタクだと思う" => "F", 
    "毎日決まった同じ仕事をするのが好き" => "E", 
    "話すより聞くほうが得意" => "D", 
    "本当に話題が合うと思う相手は少数だ" => "F", 
    "ひそかに思っていた予感が的中することが多い" => "H", 
    "実行に移していないアイデアがたくさんある" => "H", 
    "人にわかってもらいにくい独自のこだわりがある" => "F"
];

// HTML文字列用変数
$question_html = "";

// HTML文字列用変数に値を代入
for ($i=0; $i<count($data); $i++) {
    // テンプレート文字列を定義
    $subject = '<div class="form-group">
            <label for="question">
            <b>質問</b>
            </label>
            <p>内容</p>
            <div class="range">
            <span>3</span>
            <input type="range" class="custom-range" min="0" max="5" id="question" name="category" value="3">
            </div>';
    $search = ["質問", "内容", "question", "category"];
    $category = "category".current($data).$i;
    // ループ毎にテンプレートを引用し代入
    $replace = ["質問".($i+1), key($data), "question".$i, $category];
    $question_html .= str_replace($search, $replace, $subject);
    next($data);
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <title>ユングの『8つの性格診断タイプ分け』判定テスト</title>
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

    <main class="container mb-4">
        <h1>ユングの『8つの性格診断タイプ分け』判定テスト</h1>
        <p>フロイト、アドラーと並んで同時期に活躍した心理学の祖であるカール・グスタフ・ユング。彼の提唱した類型論に当てはめるため、アンケート形式で回答してもらい、その結果を表示するアプリです。履歴から、似たタイプの人を探してみたら面白いと思います。</p>

        <form action="write.php" method="post">

            <div class="form-group">
                <label for="name"></label>
                <b>名前 *</b>
                </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="contact">
                    <b>連絡先</b>
                </label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>

                <small>「よく当てはまる」なら5、「まあまあ当てはまる」なら4、「迷う感じ」なら3、「当てはまらない」や「考えたことがない」なら0で回答してください。性格は時とともに変化する部分もあるので「最近の自分」に当てはまる回答を行ってください。</small>

            <?=$question_html?>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>

        </form>

        <small>アンケート内容と分類アルゴリズムは、福島哲夫著『ユング心理学でわかる「8つの性格」』の内容を元に作成しています。</small>
    </main>

</body>

<script>
    // スライダーの値を動的に表示する
    var elem = document.getElementsByClassName('range');
    var rangeValue = function (elem, target) {
        return function(evt){
        target.innerHTML = elem.value;
        }
    }
    for(var i = 0, max = elem.length; i < max; i++){
 　　   bar = elem[i].getElementsByTagName('input')[0];
 　　   target = elem[i].getElementsByTagName('span')[0];
        bar.addEventListener('input', rangeValue(bar, target));
    }
</script>

</html>