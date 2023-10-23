<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>メイン画面</title>
    </head>
    <body>
        <h1>確認画面</h1>
        <form method="POST" action="main9-1.php">
            <h1>投稿</h1>
            <?php
                // 確認表示
                echo '<p>'.htmlspecialchars($_POST['text']).'</p>';

                // 配列postの中身を表示
                echo '<pre>';
                print_r($_POST['post']);
                echo '</pre>';

                // 配列に格納
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text']))
                {
                    $_POST['post'][] = htmlspecialchars($_POST['text']);
                }

                // 配列postの中身を表示
                echo '<pre>';
                print_r($_POST['post']);
                echo '</pre>';

                // 投稿内容をhiddenフィールドとして設定
                if (isset($_POST['post']) && is_array($_POST['post']))
                {
                    foreach ($_POST['post'] as $index => $value)
                    {
                        echo '<input type="hidden" name="post[' . $index . ']" value="' . htmlspecialchars($value) . '">';
                    }
                }
            ?>
            <button type="submit" class="btn btn-success" name="btn-post" value="btn-create">投稿</button>
        </form>

        <form method="POST" action="create9-1.php">
            <h1>修正</h1>
            <?php
                // 修正ボタンが押された場合に本文内容を指し戻す
                if (isset($_POST['text']))
                {
                    echo '<input type="hidden" name="text" value="' . htmlspecialchars($_POST['text']) . '">';
                }
            ?>
            <button type="submit" class="btn btn-warning" name="btn-fix" value="btn-fix">修正</button>
        </form>

        <form method="POST" action="main9-1.php">
            <h1>作成取消</h1>
            <button type="submit" class="btn btn-danger" name="btn-deleate" value="btn-delete">戻る</button>
        </form>
    </body>
</html>
