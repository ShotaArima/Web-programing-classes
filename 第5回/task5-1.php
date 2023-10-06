<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            $price['apple']=150;
            $price['orange']=120;
            $price['pinapple']=300;

            foreach($price as $a => $b)
            {
                echo "$a : $b<br>";
            }
        ?>
    </body>
</html>