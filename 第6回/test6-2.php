<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            $a=$_GET['Txt1'];
            $b=$_GET['Txt2'];
            echo '入力1の内容は'.htmlspecialchars($a). '<br>';
            echo '入力2の内容は:<br><pre>'.htmlspecialchars($b). '</pre><br>';
        ?>
    </body>
</html>

<!-- リンク -->
<!-- http://127.0.0.1:10800/~sspuser/test6-2.php?Text1=〇〇&Text2=〇〇 -->