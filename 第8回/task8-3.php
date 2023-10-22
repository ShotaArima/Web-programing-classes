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

            // レコードの取得
            $selectQuery = "SELECT * FROM `$tablename`";
            $result = mysqli_query($link, $selectQuery);

            if ($result) {
                // 結果を表示
                echo "<hr>";
                echo "<table border='1'>";
                echo "<th>";
                echo "<td>date</td>
                    <td>項目</td>
                    <td>収入</td>
                    <td>支出</td>
                    <td>残高</td>";
                echo "</th>";
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    foreach ($row as $key => $value)
                    {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
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
