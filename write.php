<?php 
    session_start();

    //1. POSTデータ取得
    $id = $_SESSION["id"];
    $uname = $_POST["uname"];
    $uname_child = $_POST["uname_child"];
    $birthday = $_POST["birthday"];

    // チェックボックスの値を配列で受け取る
    $capabilities = $_POST['capabilities'];
    $favorite = $_POST['favorite'];
    $values = $_POST['values'];

    // 各能力項目のチェック状態を確認（チェックされていれば1、されていなければ0）
    $capable_a = in_array("capable_a", $capabilities) ? 1 : 0;
    $capable_b = in_array("capable_b", $capabilities) ? 1 : 0;
    $capable_c = in_array("capable_c", $capabilities) ? 1 : 0;
    $capable_d = in_array("capable_d", $capabilities) ? 1 : 0;
    $capable_e = in_array("capable_e", $capabilities) ? 1 : 0;

    $favorite_a = in_array("favorite_a", $favorite) ? 1 : 0;
    $favorite_b = in_array("favorite_b", $favorite) ? 1 : 0;
    $favorite_c = in_array("favorite_c", $favorite) ? 1 : 0;
    $favorite_d = in_array("favorite_d", $favorite) ? 1 : 0;
    $favorite_e = in_array("favorite_e", $favorite) ? 1 : 0;

    $values_a = in_array("values_a", $values) ? 1 : 0;
    $values_b = in_array("values_b", $values) ? 1 : 0;
    $values_c = in_array("values_c", $values) ? 1 : 0;

//2.  DB接続
include("connect.php");

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_detail(id,uname,uname_child,birthday,capable_a,capable_b,capable_c,capable_d,capable_e,favorite_a,favorite_b,favorite_c,favorite_d,favorite_e,values_a,values_b,values_c,datetime)VALUES(:id,:uname,:uname_child,:birthday,:capable_a,:capable_b,:capable_c,:capable_d,:capable_e,:favorite_a,:favorite_b,:favorite_c,:favorite_d,:favorite_e,:values_a,:values_b,:values_c,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->bindValue(':uname',$uname,PDO::PARAM_STR);
$stmt->bindValue(':uname_child',$uname_child,PDO::PARAM_STR);
$stmt->bindValue(':birthday',$birthday,PDO::PARAM_STR);
$stmt->bindValue(':capable_a',$capable_a,PDO::PARAM_INT);
$stmt->bindValue(':capable_b',$capable_b,PDO::PARAM_INT);
$stmt->bindValue(':capable_c',$capable_c,PDO::PARAM_INT);
$stmt->bindValue(':capable_d',$capable_d,PDO::PARAM_INT);
$stmt->bindValue(':capable_e',$capable_e,PDO::PARAM_INT);
$stmt->bindValue(':favorite_a',$favorite_a,PDO::PARAM_INT);
$stmt->bindValue(':favorite_b',$favorite_b,PDO::PARAM_INT);
$stmt->bindValue(':favorite_c',$favorite_c,PDO::PARAM_INT);
$stmt->bindValue(':favorite_d',$favorite_d,PDO::PARAM_INT);
$stmt->bindValue(':favorite_e',$favorite_e,PDO::PARAM_INT);
$stmt->bindValue(':values_a',$values_a,PDO::PARAM_INT);
$stmt->bindValue(':values_b',$values_b,PDO::PARAM_INT);
$stmt->bindValue(':values_c',$values_c,PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
  }else{  
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit();
  }
  ?>