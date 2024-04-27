<?php
// function h($str){
//     return htmlspecialchars($str, ENT_QUOTES);
// }

// //SQLエラー関数：sql_error($stmt)
// function sql_error($stmt){
//     $error = $stmt->errorInfo();
//     exit("SQLError:".$error[2]);
// }

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//SessionCheck(スケルトン)
function sschk(){
  //chk_ssidがセットされていなければ、さらにいまのセッションIDとログイン時のセッションIDが違ったら、ログインエラーを出す。
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    $_SESSION["login_error"] = "セッションの有効期限が切れました。再度ログインしてください。";
    redirect("login.php");
  }else{
    session_regenerate_id(true); //セッションキーを入れ替える。REジェネレイト
    $_SESSION["chk_ssid"] = session_id();
  }
}
?>

