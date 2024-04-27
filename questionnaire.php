<?php 
session_start();
include("function.php");
sschk(); //セッションチェック（DB接続前に）
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP選手権</title>
</head>
<body>
    <header>
        <h1><a href="./"><img src="img/logo.png" alt=""></a></h1>
    </header>

<main>
  
    <!-- ステップインジケータ -->

    <div class="container-fluid">
        <ul class="list-unstyled multi-steps">
            <li>基本情報</li>
            <li>お子さまのこと</li>
            <li class="is-active">あなたのこと</li>
        </ul>
    </div>

    <form name="form1" action="write.php" method="POST" class="login_form">

    <div id="f_step">
        <div class="login_msg">
            <span class="hello">ようこそ！</span><br>
            まずは基本的な情報からお伺いします。
        </div>

        <div class="finput">
            <label for="uname" id="uname">あなたのお名前（ニックネーム可）</label>
            <input type="text" name="uname" id="uname" placeholder="">
        </div>

        <div class="finput">
            <label for="uname_child" id="uname_child">診断したいお子さまの名前（ニックネーム可）</label>
            <input type="text" name="uname_child" id="uname_child" placeholder="">
        </div>

        <div class="finput">
            <label for="birthday" id="birthday">お子さまの生年月日</label>
            <input type="date" name="birthday" id="birthday">
        </div>

        <button type="submit" id="login_btn">次へ</button>
    </div>


    <div id="s_step">
        <div class="login_msg">
            <span class="hello">お子さまに関する質問</span><br>
            今現在のお子さまの様子について教えてください。
        </div>
        <div class="chk_list">
            <label class="chk_label">今現在のお子さんができることにチェックをしましょう</label>
                <div>
                    <input type="checkbox" id="capable_a" name="capabilities[]" value="capable_a">
                    <label class="choice" for="capable_a">Aができる</label>
                </div>
                <div>
                    <input type="checkbox" id="capable_b" name="capabilities[]" value="capable_b">
                    <label class="choice" for="capable_b">Bができる</label>
                </div>
                <div>
                    <input type="checkbox" id="capable_c" name="capabilities[]" value="capable_c">
                    <label class="choice" for="capable_c">Cができる</label>
                </div>
                <div>
                    <input type="checkbox" id="capable_d" name="capabilities[]" value="capable_d">
                    <label class="choice" for="capable_d">Dができる</label>
                </div>
                <div>
                    <input type="checkbox" id="capable_e" name="capabilities[]" value="capable_e">
                    <label class="choice" for="capable_e">Eができる</label>
                </div>
        </div>
        <div class="chk_list">
            <label class="chk_label">お子さんが好きなことは何ですか？</label>
                <div>
                    <input type="checkbox" id="favorite_a" name="favorite[]" value="favorite_a">
                    <label class="choice" for="favorite_a">Aが好き</label>
                </div>
                <div>
                    <input type="checkbox" id="favorite_b" name="favorite[]" value="favorite_b">
                    <label class="choice" for="favorite_b">Bが好き</label>
                </div>
                <div>
                    <input type="checkbox" id="favorite_c" name="favorite[]" value="favorite_c">
                    <label class="choice" for="favorite_c">Cが好き</label>
                </div>
                <div>
                    <input type="checkbox" id="favorite_d" name="favorite[]" value="favorite_d">
                    <label class="choice" for="favorite_d">Dが好き</label>
                </div>
                <div>
                    <input type="checkbox" id="favorite_e" name="favorite[]" value="favorite_e">
                    <label class="choice" for="favorite_e">Eが好き</label>
                </div>
        </div>
        <button type="submit" id="login_btn">次へ</button>
    </div>
    <div id="t_step">
        <div class="login_msg">
            <span class="hello">あなたに関する質問</span><br>
            あなた自身について教えてください。
        </div>
        <div class="chk_list">
            <label class="chk_label">あなたの価値観を教えてください</label>
            <div>
                <input type="checkbox" id="values_a" name="values[]" value="values_a">
                <label class="choice" for="values_a">価値観A</label>
            </div>
            <div>
                <input type="checkbox" id="values_b" name="values[]" value="values_b">
                <label class="choice" for="values_b">価値観B</label>
            </div>
            <div>
                <input type="checkbox" id="values_c" name="values[]" value="values_c">
                <label class="choice" for="values_c">価値観C</label>
            </div>
        </div>
        <button type="submit" id="login_btn">診断する</button>
    </div>
    
    </div>
    </form>

</main>

<script>

</script>

</body>
</html>