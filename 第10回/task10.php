<?php
	// SQLの名称定義
    $hostname='127.0.0.1';
    $username='root';
    $password='dbpass';
    $dbname='task9';
    $tablename='bbs';
	mysqli_report(MYSQLI_REPORT_OFF);

echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            .post {
                border: 1px solid #ccc;
                padding: 10px;
                margin: 10px;
                background-color: #f5f5f5;
            }

            .post-text {
                font-size: 16px;
            }

            .post-time {
                font-style: italic;
                color: #888;
                /* border: 1px solid #ccc; */
                padding: 10px;
                margin: 5px;
            }

            .likes {
                color: green;
                /* border: 1px solid #ccc; */
                padding: 10px;
                margin: 5px;
            }

            .container {
                display: flex;
                justify-content: space-between; /* 両端に合わせる */
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px;
                background-color: #333;
                color: #fff;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
            }

            body {
                margin-top: 100px;
            }

        </style>
        <title>page_main</title>
    </head>
    <body>
        <div class="header">
            <h1>なんちゃって掲示板</h1>
EOT;

    // メイン画面
	if (!array_key_exists('transition', $_POST))
	{

echo <<<EOT
            <form method="post" action="create10-1.php">
                <button type="submit" class="btn btn-primary" name="btn-create" value="btn-create">新規作成</button>
                <input type="hidden" name="transition" value="trans_new"></input>
            </form>
        </div>
EOT;

		echo_page_main();
	}

    // 新規作成画面
	elseif ($_POST['transition'] == "trans_new")
	{
        echo "</div>";
		echo_page_input();
	}

    // 確認画面(遷移と表示)
	elseif ($_POST['transition'] == "trans_confirm")
	{
        echo "</div>";
		echo_page_confirm();
	}

    // 確認画面(遷移と表示)
	elseif ($_POST['transition'] == "trans_submit")
	{
        echo "</div>";
		// junction処理記述: 後述
	}

    // エラー
	elseif ($_POST['transition'] == "trans_post_erorr")
	{

echo <<<EOT
        <form method="post" action="create10-1.php">
            <button type="submit" class="btn btn-primary" name="btn-create" value="btn-create">新規作成</button>
            <input type="hidden" name="transition" value="trans_new"></input>
        </form>
    </div>
EOT;

		//trans_return_top遷移
		echo_page_main();
	}

    // 取消
    elseif ($_POST['transition'] == "transremove")
    {

echo <<<EOT
        <form method="post" action="create10-1.php">
            <button type="submit" class="btn btn-primary" name="btn-create" value="btn-create">新規作成</button>
            <input type="hidden" name="transition" value="trans_new"></input>
        </form>
    </div>
EOT;

        echo_page_main();
    }

    // あり得ないエラー
	else
	{
		echo "Internal Error!"; // あり得ないエラー
	}

echo <<<EOT
    </body>
</html>

<script>
    // document.addEventListener("DOMContentLoaded", function()
    // {
        document.getElementById("post").addEventListener("click", function()
        {
            alert("ボタンがクリックされました");
EOT;

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
                $result = mysqli_query($link, $insertQuery);
            }
echo <<<EOT
        });
</script>
EOT;

////////////////////////////////////////////////////////////////

// main画面
    function echo_page_main()
    {
        global $hostname, $username, $password, $dbname, $tablename;

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

        // レコードの取得
        $selectQuery = "SELECT * FROM `$tablename`";
        $result = mysqli_query($link, $selectQuery);

        if ($result)
        {
            // 結果を表示
            while ($row = mysqli_fetch_assoc($result))
            {
echo <<<EOT
                <hr>
                <div class='post'>
EOT;
                    echo "<p>" . htmlspecialchars($row['id']) . "</p>";
                    echo "<h5>投稿者: " . htmlspecialchars($row['name']) . "</h5>";
                    echo "<p class='post-text'>" . htmlspecialchars($row['context']) . "</p>";
                        echo '<div class="container">';
                        echo "<p class='post-time'>投稿時間: " . htmlspecialchars($row['d_when']) . "</p>";
                        echo "<p type='button' class='likes' data-post-id='{$row['id']}' data-likes='{$row['good']}'>いいね数: <span class='like-count'>" . htmlspecialchars($row['good']) . "</span></p>";
echo <<<EOT
                    </div>
                </div>
                <hr>
EOT;
            }
        }
        else
        {
            echo "Error fetching records: " . mysqli_error($link);
        }
    }

// 新規作成画面
    function echo_page_input()
    {
echo <<<EOT
        <div class="container mt-5">
            <form method="POST" action="check10-1.php">
                <h1 class="mb-4">記事入力</h1>
EOT;


                //Input field for text
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['context'])) {
                    $nameValue = htmlspecialchars($_POST['name']);
                    $textValue = htmlspecialchars($_POST['context']);
                } else {
                    $nameValue = "";
                    $textValue = "";
                }

echo <<<EOT
            <div class="form-group">
                <label for="name">名前</label>
EOT;

                echo '<input type="text" class="form-control" id="name" name="name" value="' . $nameValue . '">';

echo <<<EOT
            </div>
            <div class="form-group">
                <label for="context">本文</label>
EOT;

                echo '<textarea class="form-control" id="context" name="context" rows="5">'. $textValue .'</textarea>';

echo <<<EOT
            </div>
                <button type="submit" class="btn btn-success" name="btn-confirm" value="btn-confirm">投稿確認</button>
                <input type="hidden" name="transition" value="trans_confirm"></input>
            </form>

            <form method="POST" action="main10-1.php">
                <button type="submit" class="btn btn-danger" name="btn-cancel" value="btn-stop">作成取消</button>
                <input type="hidden" name="transition" value="trans_remove"></input>
            </form>
        </div>
EOT;

    }

// 確認画面
    function echo_page_confirm()
    {
echo <<<EOT
        <h1>確認画面</h1>
        <form method="POST" action="main10-1.php">
            <h1>投稿</h1>
                // 確認表示
                <hr>
EOT;

                echo '<div>'.htmlspecialchars($_POST['name']).'さん';
                echo '<p>'.htmlspecialchars($_POST['context']).'</p>';
                echo '<hr>';
echo <<<EOT
            <button type="submit" id="post" class="btn btn-success" name="btn-post" value="btn-create">投稿</button>
            <input type="hidden" name="transition" value="trans_submit"></input>
        </form>

        <form method="POST" action="create10-1.php">
            <h1>修正</h1>
EOT;

            // 修正ボタンが押された場合に本文内容を指し戻す
            if (isset($_POST['name']))
            {
                echo '<input type="hidden" name="name" value="' . htmlspecialchars($_POST['name']) . '">';
            }
            if (isset($_POST['context']))
            {
                echo '<input type="hidden" name="context" value="' . htmlspecialchars($_POST['context']) . '">';
            }

echo <<<EOT
            <button type="submit" class="btn btn-warning" name="btn-fix" value="btn-fix">修正</button>
            <input type="hidden" name="transition" value="trans_fix"></input>
        </form>

        <form method="POST" action="main10-1.php">
            <h1>作成取消</h1>
            <button type="submit" class="btn btn-danger" name="btn-cancel" value="btn-cancel">戻る</button>
        </form>



EOT;
    }

    function echo_page_erorr()
    {
        echo 'alert("正しく投稿できませんでした。")';
    }
?>