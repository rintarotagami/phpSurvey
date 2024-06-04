<?php
//1. POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

//ファイルへの書き込み
// $data = new stdClass();
// $data->name = $name;
// $data->email = $email;
// $data->feedback = $feedback;

// $file = fopen('../data/data.txt', "a");    // ファイル読み込み
// fwrite($file, json_encode($data) . PHP_EOL);    // ファイル書き込み
// fclose($file);    // ファイル閉じる

//2. DB接続します
//*** function化する！  *****************
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO survey_results (name, email, feedback, created_at) VALUES (:name, :email, :feedback, CURRENT_TIMESTAMP)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':feedback', $feedback, PDO::PARAM_STR);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    // surveyConfirmed.phpにnameとemailとfeedbackの値を送る
    redirect("src/surveyConfirmed.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&feedback=" . urlencode($feedback));
}
