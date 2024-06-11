<?php
//0. SESSION開始！！
session_start();
//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

// // ファイルを読み込む
// $filename = 'data/data.txt';
// $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// // データをJSONから配列に変換
// $feedbackList = array_map(function ($json) {
//     return json_decode($json, true);
// }, $data);

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM survey_results";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示/全データ取得
if ($status == false) {
    sql_error($stmt);
} else {
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rin's Survey</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen">
    <header class="w-full px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-between">
        <div class="flex items-center justify-start">
            <div class="logo">
                <a href="index.php">
                    <span class="text-white text-xl">PHPSurvey</span>
                </a>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <a href="user.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded inline-block">管理/閲覧者追加</a>
            <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block">ログアウト</a>
        </div>

    </header>

    <div class="container mx-auto mt-8">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">名前</th>
                        <th scope="col" class="py-3 px-6">メールアドレス</th>
                        <th scope="col" class="py-3 px-6">フィードバック</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($values as $v) : ?>
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6"><?= h($v['name']) ?></td>
                            <td class="py-4 px-6"><?= h($v['email']) ?></td>
                            <td class="py-4 px-6"><?= h($v['feedback']) ?></td>
                            <td class="py-4 px-6">
                                <?php if ($_SESSION["kanri_flg"] == "1") { ?>
                                    <a href="detail.php?id=<?= $v['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded inline-block">修正</a>
                                    <a href="delete.php?id=<?= $v['id'] ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-block">削除</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8">別の回答を出す</a>
    <footer class="w-full p-4 bg-gradient-to-r from-gray-700 to-gray-900">
        <p class="text-white text-center text-xl">© 2023 RinIogi</p>
    </footer>
</body>

</html>