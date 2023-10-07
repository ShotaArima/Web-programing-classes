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
                    echo "$j の個数が <span id='fruit$i-$j'>$b</span><br>";
                }
                echo "<br>";
            }
        ?>

        <div>
            <button id="apple" type="button" class="btn btn-danger" onclick="additem(0)">リンゴ追加</button>
            <button id="orange" type="button" class="btn btn-warning" onclick="additem(1)">バナナ追加</button>
            <button id="pinapple" type="button" class="btn btn-success" onclick="additem(2)">パイナップル追加</button>
        </div>
        <script>
            function additem(fruitID)
            {
                if(fruitID==0)
                {
                    // 変更前
                    var fruitNum = <?php echo $fruit[0]['num']; ?>;
                    console.log("リンゴの個数 変更前: " + fruitNum);

                    <?php
                        $fruit[0]['num']++;
                    ?>

                    // 変更後
                    alert("<?php echo $fruit[0]['name']; ?>が追加されました。");
                    var fruitNum = <?php echo $fruit[0]['num']; ?>;
                    console.log("リンゴの個数 変更後: " + fruitNum);
                }
                else if(fruitID==1)
                {
                    // 変更前
                    var fruitNum = <?php echo $fruit[1]['num']; ?>;
                    console.log("バナナの個数 変更前: " + fruitNum);

                    <?php
                        $fruit[1]['num']++;
                    ?>

                    // 変更後
                    alert("<?php echo $fruit[1]['name']; ?>が追加されました。");
                    var fruitNum = <?php echo $fruit[1]['num']; ?>;
                    console.log("バナナの個数 変更後: " + fruitNum);
                }
                else if(fruitID==2)
                {
                    // 変更前
                    var fruitNum = <?php echo $fruit[2]['num']; ?>;
                    console.log("パイナップルの個数 変更前: " + fruitNum);

                    <?php
                        $fruit[2]['num']++;
                    ?>

                    // 変更後
                    alert("<?php echo $fruit[2]['name']; ?>が追加されました。");
                    var fruitNum = <?php echo $fruit[2]['num']; ?>;
                    console.log("パイナップルの個数 変更後: " + fruitNum);
                }
                else
                {
                    alert("無効な値です。");
                }
            }
        </script>
    </body>
</html>