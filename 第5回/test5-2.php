<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            if (array_key_exists('n', $_GET))
            {
                $n=$_GET['n'];
            }
            else
            {
                $n=3;
            }

            if (array_key_exists('name', $_GET))
            {
                $name=$_GET['name'];
            }
            else
            {
                $name='Yamada';
            }

            for($i=0; $i<$n; $i++)
            {
                echo"<p>Hello $name san !</p>";
            }

            echo '<a href="http://127.0.0.1:10800/~sspuser/test5-2.php?n='. ($n+1) . '&name' . $name . '">一行増やす</a>';
        ?>

        <a href="http://127.0.0.1:10800/~sspuser/test5-2.php">戻る</a>
    </body>
</html>