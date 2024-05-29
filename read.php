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
                <span class="text-white text-xl">WithOutput</span>
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

    <?php
    // ファイルを読み込む
    $filename = 'data/data.txt';
    $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // データをJSONから配列に変換
    $feedbackList = array_map(function($json) {
        return json_decode($json, true);
    }, $data);
    ?>

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
                    <?php foreach ($feedbackList as $feedback): ?>
                    <tr class="bg-white border-b">
                        <td class="py-4 px-6"><?= htmlspecialchars($feedback['name']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($feedback['email']) ?></td>
                        <td class="py-4 px-6"><?= htmlspecialchars($feedback['feedback']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <a href="survey.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">別の回答を出す</a>
    <footer class="w-full p-4 bg-gradient-to-r from-gray-700 to-gray-900">
        <p class="text-white text-center text-xl">© 2023 RinIogi</p>
    </footer>
</body>

</html>