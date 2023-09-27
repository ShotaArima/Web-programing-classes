<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
        <p>
            <?php
                if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE") !== FALSE)
                {
                    echo "<p> あなたはInternet Explorerを使用しています。</p>";
                }
                else
                {
                    echo "<p> あなたはInternet Explorer以外を使用しています。</p>";
                }
                
            ?>
        </p>
    </body>
</html>