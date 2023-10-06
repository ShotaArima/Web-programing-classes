<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>ぺージタイトル</title>
    </head>
    <body>
        <?php
            $fruit[0]['name']='リンゴ';
            $fruit[0]['num']=0;
            $fruit[0]['price']=100;

            $fruit[1]['name']='バナナ';
            $fruit[1]['num']=0;
            $fruit[1]['price']=80;

            $fruit[2]['name']='パイナップル';
            $fruit[2]['num']=0;
            $fruit[2]['price']=120;

            for($i=0; $i<count($fruit); $i++)
            {
                foreach($fruit[$i] as $j => $b)
                {
                    echo "$j の個数が $b<br>";
                }
                echo "<br>";
            }
        ?>

        <div>
            <button id="apple" type="button" class="btn btn-danger" onclick="additem()">リンゴ追加</button>
            <button id="orange" type="button" class="btn btn-warning">オレンジ追加</button>
            <button id="pinapple" type="button" class="btn btn-success">パイナップル追加</button>
        </div>
    </body>
</html>

<script>
    function additem()
    {
        <?php
            // if document.getElementById("apple") = ;
        ?>
    }
</script>