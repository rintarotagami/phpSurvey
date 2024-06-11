<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";
?>

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
            <div class="logo">
                <a href="index.php">
                    <span class="text-white text-xl">PHPSurvey</span>
                </a>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <?php if (isset($_SESSION['chk_ssid'])) : ?>
                <span class="text-white mr-4"><?php echo $_SESSION["name"]; ?>さん</span>
                <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">ログアウト</a>
            <?php else : ?>
                <a href="login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">ログイン</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="w-full h-screen flex justify-center items-center">
        <form action="insert.php" method="post" class="w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-6">アンケートフォーム</h2>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス:</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-6">
                <label for="feedback" class="block text-sm font-medium text-gray-700">フィードバック:</label>
                <textarea id="feedback" name="feedback" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">送信</button>
        </form>
    </div>
    <footer class="w-full p-4 bg-gradient-to-r from-gray-700 to-gray-900">
        <p class="text-white text-center text-xl">© 2023 RinIogi</p>
    </footer>
</body>

</html>