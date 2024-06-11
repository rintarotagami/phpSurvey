<?php
session_start();

//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$feedback = $_POST["feedback"];
$id     = $_POST["id"];

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE survey_results SET name=:name,email=:email,feedback=:feedback WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':feedback', $feedback, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("read.php");
}

