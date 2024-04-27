<?php
session_start();

//1. POSTデータ取得
$lid = $_POST["lid"]; //lid
$lpw = $_POST["lpw"]; //lpw
$kanri_flg = 0;
$life_flg = 0;

//2.  DB接続
include("connect.php");

// パスワードをハッシュ化
$hashed_password = password_hash($lpw, PASSWORD_DEFAULT);

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(lid,lpw,kanri_flg,life_flg,registDate)VALUES(:lid,:lpw,:kanri_flg,:life_flg,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid',$lid,PDO::PARAM_STR); 
$stmt->bindValue(':lpw',$hashed_password,PDO::PARAM_STR); 
$stmt->bindValue(':kanri_flg',$kanri_flg,PDO::PARAM_STR);
$stmt->bindValue(':life_flg',$life_flg,PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  
  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT id FROM gs_user_table WHERE lid=:lid"); 
  $stmt->bindValue(':lid', $lid,PDO::PARAM_STR);
  $status = $stmt->execute();

  if($status==false){
      sql_error($stmt);
  }

  $val = $stmt->fetch();
  
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["id"]  = $val['id'];

  //５．index.phpへリダイレクト
  header("Location: questionnaire.php");
  exit();
}
?>
