<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//リダイレクト
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//SessionCheck(スケルトン)
function sschk(){
  //chk_ssidがセットされていなければ、さらにいまのセッションIDとログイン時のセッションIDが違ったら、ログインエラーを出す。
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    exit("Login Error");
  }else{
    session_regenerate_id(true); //セッションキーを入れ替える。REジェネレイト
    $_SESSION["chk_ssid"] = session_id();
  }
}
