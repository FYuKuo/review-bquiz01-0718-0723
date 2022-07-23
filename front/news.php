<?php
$num = $News->math('count');
$limit = 5;
$pages = ceil($num / $limit);
$page = $_GET['page'] ?? 1;
if ($page <= 0 || $page > $pages) {
    $page = 1;
}
$start = ($page - 1) * $limit;
$limitSql = " Limit $start,$limit";
$rows = $News->all(['sh' => 1], $limitSql);
?>
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

    <?php include('./front/marquee.php')?>

    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div style="width:95%; padding:2px; padding:5px 10px 5px 10px; position:relative;">
        <span class="t botli">
            更多最新消息顯示區
        </span>
        <ol class="ssaa" style="list-style-type:decimal;" start="<?=($page-1)*5+1?>">
            <?php

            foreach ($rows as $key => $row) {
            ?>
                <li class="sswww">
                    <?= mb_substr($row['text'], 0, 30) ?>
                    <div class="all" style="display: none;"><?=$row['text']?>

                </li>
            <?php
            }
            ?>

        </ol>
    </div>
    <div class="cent page">
            <?php
            if($page > 1){
            ?>
            <a class="bl" href="?do=<?=$do?>&page=<?=$page-1?>">
                <
            </a>
                    <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
                ?>
                <a class="bl <?=($page == $i)?'nowPage':''?> " href="?do=<?=$do?>&page=<?=$i?>">
                    <?=$i?>
                </a>
                    <?php
                }
                if($page < $pages){
                ?>
                    <a class="bl" href="?do=<?=$do?>&page=<?=$page+1?>">></a>
                    <?php
                }
                ?>
        </div>
</div>

<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>