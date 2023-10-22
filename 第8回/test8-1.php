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

            // データベースの処理をする

            // データベースを切断
            mysqli_close($link);
        ?>
    </body>
</html>
