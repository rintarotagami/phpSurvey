<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>ログイン</title>
</head>

<body class="bg-gray-100">

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
        <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">ログアウト</a>
      <?php else : ?>
        <a href="login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">ログイン</a>
      <?php endif; ?>
    </div>
  </header>

  <div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-xs">
      <form name="form1" action="login_act.php" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            ID
          </label>
          <input type="text" name="lid" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            PW
          </label>
          <input type="password" name="lpw" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-between">
          <input type="submit" value="ログイン" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
      </form>
    </div>
  </div>

</body>

</html>