<?php
$do = $_GET['do'] ?? 'title';
include('../api/base.php');
?>
<h3 class="cent"><?= $STR->updateHeader; ?></h3>
<hr>
<form action="../api/addChild.php" method="post">
    <table class="m-auto cent" style="width: 60%;">
        <tr>
            <td style="width: 40%;">
                <?= $STR->updateText; ?>
            </td>
            <td style="width: 40%;">
                <?= $STR->updateHref; ?>
            </td>
            <td>
                刪除
            </td>
        </tr>
        <?php
        $rows = $DB->all(" WHERE `parent` = {$_GET['id']}");
        foreach ($rows as $key => $row) {
            ?>
        <tr>
            <td>
                <input type="text" name="text[]" value="<?=$row['text']?>" style="width: 90%;">
            </td>
            <td>
                <input type="text" name="href[]" value="<?=$row['href']?>" style="width: 90%;">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id']?>">
            </td>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
        </tr>

        <?php
    }
        ?>

        <tr class="last_tr">
            <td colspan="3" class="cent">
                <input type="hidden" name="parentId" value="<?=$_GET['id']?>">
                <input type="hidden" name="table" value="<?=$do?>">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
                <input type="button" class="addBtn" value="更多選單">
            </td>
        </tr>
    </table>
</form>


<script>
    $(document).ready(function(){

        $('.addBtn').click(function(){
            
            $('.last_tr').before(`<tr>
                <td>
                    <input type="text" name="textAdd[]" style="width: 90%;">
                </td>
                <td>
                    <input type="text" name="hrefAdd[]" style="width: 90%;">
                </td>
                <td>
                </td>
            </tr>`)
        })
    })
</script>