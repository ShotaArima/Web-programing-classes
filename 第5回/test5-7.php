<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            $id['poti']=201;
            $id['tama']=205;
            $k=array_keys($id);

            for($i=0;$i<count($k);$i++)
            {
                $a=$k[$i];
                $b=$id[$a];
                echo "$a : $b<br>";
            }
        ?>
    </body>
</html>