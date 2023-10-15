<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>メイン画面</title>
    </head>
    <body>
        <h1>確認画面</h1>
        <form method="POST" action="main6-1.php">
            <h1>投稿</h1>
            <?php
                // 最後に投稿された内容を表示
                $postKeys = array_keys($_POST['text']);
                $lastPostIndex = end($postKeys);
                $lastPostContent = $_POST['post'][$lastPostIndex];

                echo '<p> ' . htmlspecialchars($lastPostContent) . '</p>';//正直ここを最後表示
                echo '[' . htmlspecialchars($lastPostIndex) . ']=' . '"' . htmlspecialchars($lastPostContent) . '"</p>';
            ?>
            <button type="submit" class="btn btn-success" name="btn-post" value="btn-create">投稿</button>
        </form>

        <form method="POST" action="create6-1.php">
            <h1>修正</h1>
            <?php
                // 修正ボタンが押された場合にその添え字を渡す
                echo '<input type="hidden" name="post_index_to_edit" value="' . htmlspecialchars($lastPostIndex) . '">';
            ?>
            <button type="submit" class="btn btn-warning" name="post[]" value="btn-fix">修正</button>
        </form>

        <form method="POST" action="main6-1.php">
            <h1>作成取消</h1>
            <button type="submit" class="btn btn-danger" name="btn-deleate" value="btn-delete">戻る</button>
        </form>
    </body>
</html>