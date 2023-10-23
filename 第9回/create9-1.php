<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>投稿記事入力画面</title>
    </head>
    <body>
        <div class="container mt-5">
            <form method="POST" action="check9-1.php">
                <h1 class="mb-4">記事入力</h1>

                <!-- Input field for text -->
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['context'])) {
                        $nameValue = htmlspecialchars($_POST['name']);
                        $textValue = htmlspecialchars($_POST['context']);
                    } else {
                        $nameValue = "";
                        $textValue = "";
                    }
                ?>
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameValue; ?>">
                </div>
                <div class="form-group">
                    <label for="context">本文</label>
                    <textarea class="form-control" id="context" name="context" rows="5"><?php echo $textValue; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="btn-confirm" value="btn-create">投稿確認</button>
            </form>

            <form method="POST" action="main9-1.php">
                <button type="submit" class="btn btn-danger" name="btn-cancel" value="btn-stop">作成取消</button>
            </form>
        </div>
    </body>
</html>
