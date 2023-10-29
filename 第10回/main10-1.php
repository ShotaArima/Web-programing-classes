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
            <form method="post" action="create10-1.php">
                <button type="submit" class="btn btn-primary" name="btn-create" value="btn-create">新規作成</button>
                <input type="hidden" name="transition" value="trans_new"></input>
            </form>
        </div>
        <?php

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

            // レコードの取得
            $selectQuery = "SELECT * FROM `$tablename`";
            $result = mysqli_query($link, $selectQuery);

            if ($result) {
                // 結果を表示
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<hr>";
                    echo "<div class='post'>";
                    echo "<p>" . htmlspecialchars($row['id']) . "</p>";
                    echo "<h5>投稿者: " . htmlspecialchars($row['name']) . "</h5>";
                    echo "<p class='post-text'>" . htmlspecialchars($row['context']) . "</p>";
                        echo '<div class="container">';
                        echo "<p class='post-time'>投稿時間: " . htmlspecialchars($row['d_when']) . "</p>";
                        echo "<p type='button' class='likes' data-post-id='{$row['id']}' data-likes='{$row['good']}'>いいね数: <span class='like-count'>" . htmlspecialchars($row['good']) . "</span></p>";
                        echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                }
            } else
            {
                echo "Error fetching records: " . mysqli_error($link);
            }

            mysqli_free_result($result);

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
