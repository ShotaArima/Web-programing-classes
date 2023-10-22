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

            $dbname='testdb2';
            $tablename='table1';

            mysql_report(MYSQLI_REPORT_OFF);

            // データベースへ接続
            $link=mysqli_connect($hostname,$username,$password);
            if(! $link)
            {
                exit("Connect erorr!");
            }

            $result=mysqli_query($link, "USE $dbname");
            if(! $result)
            {
                exit("USE failed!");
            }

            $result=mysqli_query($link, "INSERT INTO $tablename SET name='Ep-A1', weight=250.5, price=20000");
            if(! $result)
            {
                exit("INSERT erorr!");
            }

            echo "Insert succeeded!\n";

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
