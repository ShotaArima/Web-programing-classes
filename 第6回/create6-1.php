<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>投稿記事入力画面</title>
    </head>
    <body>
        <form method="POST" action="check6-1.php">
            <h1>記事入力</h1>
            <!-- <input type="text" name="text" value=""> -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text'])) {
                $textValue = htmlspecialchars($_POST['text']);
                echo '<input type="text" name="text" value="' . $textValue . '">';
            } else {
                echo '<input type="text" name="text" value="">';
            }
        ?>

            <button type="submit" class="btn btn-success" name="btn-confirm" value="btn-create">確認</button>
        </form>
        <form method="POST" action="main6-1.php">
            <h1>作成取消</h1>
            <button type="button" class="btn btn-danger" name="btn-cancel" value="btn-create">戻る</button>
        </form>
    </body>
</html>