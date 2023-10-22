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

            $createDbQuery="CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8";

            $createTableQuery = "CREATE TABLE IF NOT EXISTS `$tablename` (
                id INT NOT NULL AUTO_INCREMENT,
                transaction_date DATE,
                pretext TEXT,
                income INT,
                expense INT,
                balance INT,
                PRIMARY KEY (id)
            ) CHARACTER SET utf8";

            $insertQuery="INSERT INTO `$tablename` (transaction_date, pretext, income, expense, balance) VALUES ('2023-01-01', 'tuika-otoshidama', 1000, 0, 1000),('2023-01-02', 'kaimono', 0, 200, 800)";

            // mysql_report(MYSQLI_REPORT_OFF);

            // データベースへ接続
            $link=mysqli_connect($hostname,$username,$password);
            if(! $link)
            {
                exit("Connect erorr!");
            }


            // データベースの作成
            $result = mysqli_query($link,$createDbQuery);
            if (!$result)
            {
                exit("Create error on table ($dbname)!");
            }

            // データべースの選択
            $result = mysqli_select_db($link,$dbname);
            if (!$result)
            {
                exit("Use error on table ($dbname)!");
            }

            // テーブルの作成
            $result = mysqli_query($link,$createTableQuery);
            if (!$result)
            {
                exit("Create error on table ($tablename)!");
            }

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
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $value) {
                        echo htmlspecialchars($key) . " : " . htmlspecialchars($value) . "<br>";
                    }
                    echo "<hr>";
                }
            } else {
                echo "Error fetching records: " . mysqli_error($link);
            }

            echo "<hr>";
            mysqli_free_result($result);

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
