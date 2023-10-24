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

                // $_POST['name']=$_POST['name'];
                // $_POST['context']=$_POST['context'];
                // 確認表示
                echo '<hr>';
                echo '<div>'.htmlspecialchars($_POST['name']).'さん';
                echo '<p>'.htmlspecialchars($_POST['context']).'</p>';
                echo '<hr>';

                // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-post']))
                // {
                    // ボタンが押された時刻を取得
                    $clickedTime = date("Y-m-d H:i:s");
                    // SQLの名称定義
                    $hostname='127.0.0.1';
                    $username='root';
                    $password='dbpass';
                    $dbname='task9';
                    $tablename='bbs';

                    // mysql_report(MYSQLI_REPORT_OFF);

                    // データベースへ接続
                    $link=mysqli_connect($hostname,$username,$password);
                    if(! $link)
                    {
                        exit("Connect erorr!");
                    }

                    // データべースの選択
                    $result = mysqli_select_db($link,$dbname);
                    if (!$result)
                    {
                        exit("Use error on table ($dbname)!");
                    }

                    // 検証とエスケープ
                    $_POST['name'] = mysqli_real_escape_string($link, $_POST['name']);
                    $_POST['context'] = mysqli_real_escape_string($link, $_POST['context']);

                    // レコードの取得
                    $selectQuery = "SELECT * FROM `$tablename`";
                    $result = mysqli_query($link, $selectQuery);

                    //時刻の生成
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        // この時刻をDATETIME型に変換
                        $datetime = new DateTime($clickedTime);
                        $formattedDatetime = $datetime->format("Y-m-d H:i:s");
                        // $formattedDatetime を使用して何か処理を行うことができます
                        // 例: データベースに挿入するなど
                    }

                    // レコードの作成
                    $insertQuery = "INSERT INTO `$tablename` (d_when, name, context, good) VALUES ('$formattedDatetime', '{$_POST['name']}', '{$_POST['context']}', 0)";

                    if (!empty($_POST['name']) && !empty($_POST['context']))
                    {
                        // レコードの追加
                        $result = mysqli_query($link, $insertQuery);
                    }
            ?>
            <button type="submit" id="submit" class="btn btn-success" name="btn-post" value="btn-create">投稿</button>
        </form>

        <form method="POST" action="create9-1.php">
            <h1>修正</h1>
            <?php
                // 修正ボタンが押された場合に本文内容を指し戻す
                if (isset($_POST['name']))
                {
                    echo '<input type="hidden" name="name" value="' . htmlspecialchars($_POST['name']) . '">';
                }
                if (isset($_POST['context']))
                {
                    echo '<input type="hidden" name="context" value="' . htmlspecialchars($_POST['context']) . '">';
                }
            ?>
            <button type="submit" class="btn btn-warning" name="btn-fix" value="btn-fix">修正</button>
        </form>

        <form method="POST" action="main9-1.php">
            <h1>作成取消</h1>
            <button type="submit" class="btn btn-danger" name="btn-cancel" value="btn-cancel">戻る</button>
        </form>
    </body>
</html>
