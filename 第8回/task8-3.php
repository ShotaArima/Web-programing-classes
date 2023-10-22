<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            // SQLの名称定義
            $hostname='127.0.0.1';
            $username='root';
            $password='dbpass';
            $dbname='task8';
            $tablename='allowance';

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

            // レコードの作成
            // ポストで受け取ったデータを変数に入れ替え、レコードに追加する

            $insertQuery="INSERT INTO `$tablename` (transaction_date, pretext, income, expense, balance) VALUES ('2023-01-01', 'otoshidama', 1000, 0, 1000),('2023-01-02', 'kaimono', 0, 200, 800)";


            // レコードの追加
            $result = mysqli_query($link,$insertQuery);
            if (!$result)
            {
                exit("Insert error on table ($tablename)!");
            }

            // レコードの取得
            $selectQuery = "SELECT * FROM `$tablename`";
            $result = mysqli_query($link, $selectQuery);

            if ($result) {
                // 結果を表示
                echo "<hr>";
                echo "<table border="1'>";
                while ($row = mysqli_fetch_assoc($result))
                {
                    foreach ($row as $key => $value)
                    {
                        echo "<td>"htmlspecialchars($key) . " : " . htmlspecialchars($value) . "</td><br>";
                    }
                    echo "<hr>";
                }
                echo "</table>";
            } else
            {
                echo "Error fetching records: " . mysqli_error($link);
            }

            echo "<hr>";
            mysqli_free_result($result);

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
