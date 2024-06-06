<?php

$id = $_GET["id"]; //GET

include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM survey_results WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
// $values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$row = $stmt->fetch();
// $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rin's Survey</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="w-full px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-between">
        <div class="flex items-center justify-start">
            <Hamburger />
            <div class="logo">
                <span class="text-white text-xl">PHPSurvey</span>
            </div>
        </div>
        <div class="flex-grow flex items-center justify-center">
            <SearchBar />
        </div>
        <div class="flex items-center justify-end">
            <ProfileToggleButton />
            <ConfigButton />
        </div>
    </header>

    <div class="w-full h-screen flex justify-center items-center">
        <form action="update.php" method="post" class="w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-6">アンケートフォーム</h2>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前:</label>
                <input value="<?=$row["name"]?>" type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス:</label>
                <input value="<?=$row["email"]?>" type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-6">
                <label for="feedback" class="block text-sm font-medium text-gray-700">フィードバック:</label>
                <textarea id="feedback" name="feedback" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?=$row["feedback"]?></textarea>
            </div>
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">送信</button>
        </form>
    </div>
    <footer class="w-full p-4 bg-gradient-to-r from-gray-700 to-gray-900">
        <p class="text-white text-center text-xl">© 2023 RinIogi</p>
    </footer>
</body>

</html>
