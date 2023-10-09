<!DOCTYPE html>
<html>
    <head>
        <?php
            $box[0]="abc";
            $box[1]="def";
            $box[2]=5;
            $box[3]=9;
        ?>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <p>
            <?php
                $n=count($box);
                for($i=0; $i<$n; $i++)
                {
                    $value=$box[$i];
                    echo 'box「';
                    echo $i;
                    echo '」は「';
                    echo $value;
                    echo '」です。<br>';
                }
            ?>
        </p>
    </body>
</html>