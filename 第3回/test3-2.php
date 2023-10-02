<DOCTYPE html>
<html>
    <?php
        $a = 8;
        $apple = 'hogehoge';
        $h1_open = '<h1>';
        $h1_close = '</h1>';
    ?>
    <head>
        <meta charset = "UTF-8" />
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            echo $h1_open;
            echo $apple;
            echo $h1_close;
        ?>
        <p>
            <?php
                echo $a;
                echo $apple;
            ?>
        </p>
    </body>
</html>