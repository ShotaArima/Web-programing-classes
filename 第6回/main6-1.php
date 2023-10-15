<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>メイン画面</title>
    </head>
    <body>
        <h1>なんちゃって掲示板</h1>
        <form method="post" action="create6-1.php">
            <button type="submit" class="btn btn-primary" name="btn-create">新規作成</button>
        </form>
        <?php
            echo '<h3>記事の内容</h3>';
            if (isset($_POST['post']))
            {
                foreach($_POST['post'] as $key => $value)
                {
                    echo '<p> ' . htmlspecialchars($value) . '</p>';
                    echo '[' . htmlspecialchars($key) . ']=' . '"' . htmlspecialchars($value) . '"</p>';
                }
            } else
            {
                echo '投稿はありません。';
            }
        ?>
    </body>
</html>