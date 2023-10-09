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
            $fruit[0]['num']=$_GET['num_apple'];
            $fruit[0]['price']=100;

            $fruit[1]['name']='バナナ';
            $fruit[1]['num']=$_GET['num_banana'];
            $fruit[1]['price']=80;

            $fruit[2]['name']='パイナップル';
            $fruit[2]['num']=$_GET['num_pinapple'];
            $fruit[2]['price']=120;

            for($i=0; $i<count($fruit); $i++)
            {
                foreach($fruit[$i] as $j => $b)
                {
                    if($b<0)
                    {
                        echo "<a style='color: red;'>$j :$b</a><br>";
                    }
                    else
                    {
                        echo "$j :$b<br>";
                    }
                }
                echo "<br>";
            }
        ?>

        <!-- 追加のボタン -->
        <div>
            <a id="addapple" class="btn btn-danger" style="border: 5px solid #dc3545;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=<?php echo ($fruit[0]['num'] + 1); ?>&num_banana=<?php echo $fruit[1]['num']; ?>&num_pinapple=<?php echo $fruit[2]['num']; ?>">リンゴ追加</a>
            <a id="addbanana" class="btn btn-warning" style="border: 5px solid #ffc107;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=<?php echo $fruit[0]['num']; ?>&num_banana=<?php echo ($fruit[1]['num'] + 1); ?>&num_pinapple=<?php echo $fruit[2]['num']; ?>">バナナ追加</a>
            <a id="addpineapple" class="btn btn-success" style="border: 5px solid #198754;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=<?php echo $fruit[0]['num']; ?>&num_banana=<?php echo $fruit[1]['num']; ?>&num_pinapple=<?php echo ($fruit[2]['num'] + 1); ?>">パイナップル追加</a>
        </div>

        <!-- 削除のボタン -->
        <div>
            <?php
                if ($fruit[0]['num'] > 0)
                {
                    echo '<a id="delapple" class="btn btn-danger" style="background-color: white; border: 5px solid #dc3545; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' . ($fruit[0]['num'] - 1) . '&num_banana=' . $fruit[1]['num'] . '&num_pinapple=' . $fruit[2]['num'] . '">リンゴ削除</a>';
                }
                else
                {
                    $fruit[0]['num']=0;
                    echo '<a id="delapple" class="btn btn-danger" style="background-color: white; border: 5px solid #dc3545; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' . $fruit[0]['num'] . '&num_banana=' . $fruit[1]['num'] . '&num_pinapple=' . $fruit[2]['num'] . '">リンゴ削除</a>';
                }

                if ($fruit[1]['num'] > 0)
                {
                    echo '<a id="delbanana" class="btn btn-warning" style="background-color: white; border: 5px solid #ffc107; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' .$fruit[0]['num'] . '&num_banana=' . ($fruit[1]['num'] - 1) .'&num_pinapple=' . $fruit[2]['num'].'">バナナ削除</a>';
                }
                else
                {
                    $fruit[1]['num']=0;
                    echo '<a id="delbanana" class="btn btn-warning" style="background-color: white; border: 5px solid #ffc107; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' .$fruit[0]['num'] . '&num_banana=' . $fruit[1]['num'] .'&num_pinapple=' . $fruit[2]['num'].'">バナナ削除</a>';
                }
                if ($fruit[2]['num'] > 0)
                {
                    echo '<a id="delpineapple" class="btn btn-success" style="background-color: white; border: 5px solid #198754; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' . $fruit[0]['num'] . '&num_banana=' . $fruit[1]['num'] . '&num_pinapple=' . ($fruit[2]['num'] - 1) . '">パイナップル削除</a>';
                }
                else
                {
                    $fruit[2]['num']=0;
                    echo '<a id="delpineapple" class="btn btn-success" style="background-color: white; border: 5px solid #198754; color: black;" href="http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=' . $fruit[0]['num'] . '&num_banana=' . $fruit[1]['num'] . '&num_pinapple=' . $fruit[2]['num'] . '">パイナップル削除</a>';
                }
            ?>
        </div>
        <?php
            $total=$fruit[0]['num']*$fruit[0]['price']+$fruit[1]['num']*$fruit[1]['price']+$fruit[2]['num']*$fruit[2]['price'];
        ?>
        <p>合計金額は<?php echo "$total"; ?>
        </p>
    </body>
</html>

<!-- 初期状態 -->
<!-- http://127.0.0.1:10800/~sspuser/task5-3.php?num_apple=0&num_banana=0&num_pinapple=0 -->