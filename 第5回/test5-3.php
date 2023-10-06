<!DOCTYPE html>
<html>
    <head>
        <?php
            $box[0]="abc";
            $box[1]="def";
            $box[2]=5;
            $box[3]=9;

            // $box[]="abc";
            // $box[]="def";
            // $box[]=5;
            // $box[]=9;
            // でも可能
        ?>

        <meta charset="UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <p>
            <?php
                echo '$box[0]は「'.$box[0].'」です。<br>';
                echo '$box[1]は「'.$box[1].'」です。<br>';
                echo "$box[2]は「{$box[2]}」です。<br>";
                echo '$box[3]は「'.$box[3].'」です。';
            ?>
        </p>
    </body>
</html>