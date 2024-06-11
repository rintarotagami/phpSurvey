
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート送信確認</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
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
    <div class="h-full flex-grow flex justify-center items-center">
        <div class="w-1/2 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-6">下記の内容でアンケートを送信しました</h2>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">項目</th>
                        <th scope="col" class="px-6 py-3">内容</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">名前</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($_GET['name']); ?></td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">メールアドレス</td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($_GET['email']); ?></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-6 py-4">フィードバック</td>
                        <td class="px-6 py-4"><?php echo nl2br(htmlspecialchars($_GET['feedback'])); ?></td>
                    </tr>
                </tbody>
            </table>
            <p class="text-sm text-gray-700 mb-4">ご協力ありがとうございました。</p>
            <div class="mt-8">
                <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">別の回答を出す</a>
            </div>
            <div class="mt-8">
                <a href="read.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">回答一覧を表示</a>
            </div>
        </div>
    </div>
    <footer class="w-full p-4 bg-gradient-to-r from-gray-700 to-gray-900">
        <p class="text-white text-center text-xl">© 2023 RinIogi</p>
    </footer>
</body>

</html>