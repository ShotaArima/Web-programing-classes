<DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <table border=1>
            <?php
                $limit = 9;
                for($i = 0; $i <= $limit; $i++)
                {
                    for($j = 0; $j <= $limit; $j++)
                    {
                        if(($i==0)&&($j==0))
                        {
                            echo "<th>x</th>";
                        }
                    }
                }
            ?>
        </table>
    </body>
</html>