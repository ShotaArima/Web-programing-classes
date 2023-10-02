<DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8" />
        <title>ぺージタイトル</title>
        <style>
            th
            {
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <!-- テーブルの記述 -->
        <table border=1>
            <?php
                $limit = 9;
                for($i = 0; $i <= $limit; $i++)
                {
                    echo "<tr>";
                    echo "<th>";
                    if($i==0)
                    {
                        echo "x";
                    }
                    else
                    {
                        echo "$i";
                    }
                    echo "</th>";

                    for($j = 1; $j <= $limit; $j++)
                    {
                        // ヘッダーの記述
                        if($i==0)
                        {
                            echo "<th>$j</th>";
                        }
                        else
                        {
                            // 中身の記述
                            $result=$i*$j;
                            echo "<td>$result</td>";
                        }
                    }
                echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>