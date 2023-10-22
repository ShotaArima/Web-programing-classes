<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            $hostname='127.0.0.1';
            $username='root';
            $password='dbpass';

            mysql_report(MYSQLI_REPORT_OFF);

            // データベースへ接続
            $link=mysqli_connect($hostname,$username,$password);
            if(! $link)
            {
                exit("Connect erorr!");
            }

            $dbname = 'testdb2';
            $tablename = 'table1';

            //データベースに接続
            mysqli_report(MYSQLI_REPORT_OFF);
            $link = mysqli_connect('127.0.0.1','root','dbpass',$dbname);
            if (! $link){
                exit("Connect error!");
            }

            // テーブルの追加
            $result = mysqli_query($link,"SELECT * FROM $tablename");
            if (!$result)
            {
                exit("Select error on table ($tablename)!");
            }

            // 全ての行の結果を返す
            while ($row = mysqli_fetch_row($result))
            {
                echo "<hr>";
                foreach ($row as $key => $value)
                {
                    echo htmlspecialchars($key) . " : ";
                    echo htmlspecialchars($value) . "<br>";
                }
            }
            echo "<hr>";
            mysqli_free_result($result);
            mysqli_close($link);

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
