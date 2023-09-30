<DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <!-- テーブルの記述 -->
        <table border=1>
            <?php
                $limit = 9;
                for($i = 0; $i <= $limit; $i++)
                {
                    for($j = 0; $j <= $limit; $j++)
                    {
                        // ヘッダーの記述
                        echo "<th>"
                        if($i==0)
                        {
                            echo "<li>x</li>";
                        }
                        echo "</th>"

                        // 中身の記述
                    }
                }
            ?>
        </table>
    </body>
</html>