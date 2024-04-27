<?php 
session_start();
if (isset($_SESSION["login_error"])){
  $lerror_msg = $_SESSION["login_error"];
  unset($_SESSION["login_error"]);
} else {
  $lerror_msg = "";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<header>
    <h1><a href="./"><img src="img/logo.png" alt=""></a></h1>
</header>


<main>
  <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
  <div class="login_msg">
    <span class="hello">おかえりなさい！</span><br>
    ログインをして記録を再開しましょう。
  </div>

  <?php if(isset($lerror_msg)): ?>
    <div class="lerror_msg"><?= $lerror_msg; ?></div>
  <?php endif; ?>

  <form name="form1" action="login_act.php" method="POST" class="login_form">
    <div class="finput">
      <label for="lid" id="lid_label">メールアドレス</label><input type="text" name="lid" id="lid" placeholder="name@example.com">
      <p id="mailerror" class="error_msg" style="display:none;">メールアドレスの形式が正しくありません。</p>
    </div>
    <div class="finput">
      <label for="lpw">パスワード</label><input type="password" name="lpw" id="lpw" placeholder="password">
      <?php if(isset($_SESSION["error_flg"])): ?>
        <p id="pwerror" class="error_msg">メールアドレスまたはパスワードが誤っています。</p>
        <?php endif; ?>
    </div>    
    <button type="submit" id="login_btn">ログイン</button>
    <div class="consent">ログインすることで、<a href="">利用規約</a>および<a href="">プライバシーポリシー</a>へ同意したものとみなします。</div>
  </form>

  <div class="signup_link">アカウントを持っていない場合はこちら</div>
</main>

<script>
  $("#login_btn").on("click",function(e){
    e.preventDefault;

    let lid = $("#lid").val();
    const regex = /^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,}$/;

    console.log(lid);

    if (regex.test(lid)){
      $("#mailerror").hide();
      $("#lid").css("border","solid 1px #343434");
      $("#lid_label").css("color","");
      this.submit;
    } else {
      $("#mailerror").show();
      $("#lid").css("border","solid 1px #d52300");
      $("#lid_label").css("color","#d52300");
      return false;
    }
  });


</script>



</body>
</html>