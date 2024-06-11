<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
sschk();

// リダイレクト後のポップアップ表示
if (isset($_SESSION['userAdded']) && $_SESSION['userAdded']) {
    echo '<script>alert("ユーザーを追加しました。");</script>';
    $_SESSION['userAdded'] = false; // ポップアップが再表示されないようにリセット
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERデータ登録</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <!-- Head[Start] -->
  <header class="w-full px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-between">
        <div class="flex items-center justify-start">
            <div class="logo">
                <a href="index.php">
                    <span class="text-white text-xl">PHPSurvey</span>
                </a>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <?php if(isset($_SESSION['chk_ssid'])): ?>
                <span class="text-white mr-4"><?php echo $_SESSION["name"]; ?>さん</span>
                <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">ログアウト</a>
            <?php else: ?>
                <a href="login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">ログイン</a>
            <?php endif; ?>
        </div>
  </header>
  <!-- Main[Start] -->
  <form method="post" action="user_insert.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <h2 class="block text-gray-700 text-xl font-bold mb-2">ユーザー登録</h2>
      <div class="mb-3">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">名前：</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" name="name">
      </div>
      <div class="mb-3">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="lid">Login ID：</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="lid" name="lid">
      </div>
      <div class="mb-3">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="lpw">Login PW：</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="lpw" name="lpw">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">管理FLG：</label>
        <div class="mt-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="kanri_flg" value="0">
            <span class="ml-2">閲覧者</span>
          </label>
          <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio" name="kanri_flg" value="1">
            <span class="ml-2">管理者</span>
          </label>
        </div>
      </div>
      <div class="flex items-center justify-between">
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="送信">
      </div>
    </div>
  </form>
  <!-- Main[End] -->


</body>

</html>