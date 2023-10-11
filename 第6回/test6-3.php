<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>ぺージタイトル</title>
    </head>
    <body>
        <h3>$_GET[]の内容</h3>
        <?php
            // echo '$_GET=<pre>' .htmlspecialchars(print_r($_GET,true)). '</pre></dd>';

            foreach ($_GET as $key => $value)
            {
                if (is_string($value))
                {
                    echo '<p> $_GET['. htmlspecialchars($key). ']=';
                    echo '"' .htmlspecialchars($value).'"</p>';
                }
                elseif (is_array($value))
                {
                    foreach($value as $a_key => $a_value)
                    {
                        echo '<p> $_GET[' .htmlspecialchars($key). ']';
                        echo '['.htmlspecialchars($a_key).']=';
                        echo '"'.htmlspecialchars($a_value).'"</p>';
                    }
                }
                else
                {
                    echo '<p> $_GET[' .htmlspecialchars($key). ']=';
                    echo '<pre>'.htmlspecialchars(print_r($value,ture)).'</pre>';
                }
            }
            echo '<hr>';
            echo '<h3> $_POST[]の内容</h3>';

            // echo '$_POST=<pre>' .htmlspecialchars(print_r($_POST,true)). '</pre></dd>';
            foreach ($_POST as $key => $value)
            {
                if (is_string($value))
                {
                    echo '<p> $_POST['. htmlspecialchars($key). ']=';
                    echo '"' .htmlspecialchars($value).'"</p>';
                }
                elseif (is_array($value))
                {
                    foreach($value as $a_key => $a_value)
                    {
                        echo '<p> $_POST[' .htmlspecialchars($key). ']';
                        echo '['.htmlspecialchars($a_key).']=';
                        echo '"'.htmlspecialchars($a_value).'"</p>';
                    }
                }
                else
                {
                    echo '<p> $_POST[' .htmlspecialchars($key). ']=';
                    echo '<pre>'.htmlspecialchars(print_r($value,ture)).'</pre>';
                }
            }
        ?>
    </body>
</html>